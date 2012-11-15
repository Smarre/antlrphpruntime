<?php

/*
  [The "BSD license"]
  Copyright (c) 2005-2009 Terence Parr
  All rights reserved.

  Redistribution and use in source and binary forms, with or without
  modification, are permitted provided that the following conditions
  are met:
  1. Redistributions of source code must retain the above copyright
  notice, this list of conditions and the following disclaimer.
  2. Redistributions in binary form must reproduce the above copyright
  notice, this list of conditions and the following disclaimer in the
  documentation and/or other materials provided with the distribution.
  3. The name of the author may not be used to endorse or promote products
  derived from this software without specific prior written permission.

  THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR
  IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
  OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
  IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT,
  INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT
  NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
  DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
  THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
  (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF
  THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

namespace Antlr\Runtime\Misc;

use Antlr\Runtime\Token;

/** A lookahead queue that knows how to mark/release locations
 *  in the buffer for backtracking purposes. Any markers force the FastQueue
 *  superclass to keep all tokens until no more markers; then can reset
 *  to avoid growing a huge buffer.
 */
abstract class LookaheadStream extends FastQueue
{
    const UNINITIALIZED_EOF_ELEMENT_INDEX = PHP_INT_MAX;

    /** Absolute token index. It's the index of the symbol about to be
     *  read via LT(1). Goes from 0 to numtokens.
     */
    protected $currentElementIndex = 0;
    protected $prevElement;
    /** Track object returned by nextElement upon end of stream;
     *  Return it later when they ask for LT passed end of input.
     */
    public $eof = null;
    /** Track the last mark() call result value for use in rewind(). */
    protected $lastMarker;
    /** tracks how deep mark() calls are nested */
    protected $markDepth = 0;

    public function reset()
    {
        parent::reset();
        $this->currentElementIndex = 0;
        $this->p = 0;
        $this->prevElement = null;
    }

    /** Implement nextElement to supply a stream of elements to this
     *  lookahead buffer.  Return eof upon end of the stream we're pulling from.
     */
    public abstract function nextElement();

    public abstract function isEOF($o);

    /** Get and remove first element in queue; override FastQueue.remove();
     *  it's the same, just checks for backtracking.
     */
    public function remove()
    {
        $o = $this->elementAt(0);
        $this->p++;
        // have we hit end of buffer and not backtracking?
        if ($this->p == count($this->data) && $this->markDepth == 0) {
            // if so, it's an opportunity to start filling at index 0 again
            $this->clear(); // size goes to 0, but retains memory
        }
        return $o;
    }

    /** Make sure we have at least one element to remove, even if EOF */
    public function consume()
    {
        $this->syncAhead(1);
        $this->prevElement = $this->remove();
        $this->currentElementIndex++;
    }

    /** Make sure we have 'need' elements from current position p. Last valid
     *  p index is data.size()-1.  p+need-1 is the data index 'need' elements
     *  ahead.  If we need 1 element, (p+1-1)==p must be < data.size().
     */
    protected function syncAhead($need)
    {
        $n = ($this->p + $need - 1) - count($this->data) + 1; // how many more elements we need?
        if ($n > 0) {
            $this->fill($n); // out of elements?
        }
    }

    /** add n elements to buffer */
    public function fill($n)
    {
        for ($i = 1; $i <= $n; $i++) {
            $o = $this->nextElement();
            if ($this->isEOF($o)) {
                $this->eof = $o;
            }
            $this->data[] = $o;
        }
    }

    /** Size of entire stream is unknown; we only know buffer size from FastQueue */
    public function size()
    {
        throw new \BadMethodCallException("streams are of unknown size");
    }

    public function LT($k)
    {
        if ($k == 0) {
            return null;
        }
        if ($k < 0) {
            return $this->LB(-$k);
        }
        //System.out.print("LT(p="+p+","+k+")=");
        $this->syncAhead($k);
        if (($this->p + $k - 1) > count($this->data)) {
            return $this->eof;
        }
        return $this->elementAt($k - 1);
    }

    public function index()
    {
        return $this->currentElementIndex;
    }

    public function mark()
    {
        $this->markDepth++;
        $this->lastMarker = $this->p; // track where we are in buffer not absolute token index
        return $this->lastMarker;
    }

    public function release($marker=null)
    {
        // no resources to release
    }

    public function rewind($marker = null)
    {
        if ($marker === null) {
            $marker = $this->lastMarker;
        }
        $this->markDepth--;
        $this->seek($marker); // assume marker is top
        // $this->release(marker); // waste of call; it does nothing in this class
    }

    /** Seek to a 0-indexed position within data buffer.  Can't handle
     *  case where you seek beyond end of existing buffer.  Normally used
     *  to seek backwards in the buffer. Does not force loading of nodes.
     *  Doesn't see to absolute position in input stream since this stream
     *  is unbuffered. Seeks only into our moving window of elements.
     */
    public function seek($index)
    {
        $this->p = $index;
    }

    protected function LB($k)
    {
        if ($k == 1)
            return $this->prevElement;
        throw new \OutOfBoundsException("can't look backwards more than one token in this stream");
    }

}