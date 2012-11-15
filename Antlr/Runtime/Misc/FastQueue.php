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

/** A queue that can dequeue and get(i) in O(1) and grow arbitrarily large.
 *  A linked list is fast at dequeue but slow at get(i).  An array is
 *  the reverse.  This is O(1) for both operations.
 *
 *  List grows until you dequeue last element at end of buffer. Then
 *  it resets to start filling at 0 again.  If adds/removes are balanced, the
 *  buffer will not grow too large.
 *
 *  No iterator stuff as that's not how we'll use it.
 */
class FastQueue
{

    /** dynamically-sized buffer of elements */
    protected $data = array();
    /** index of next element to fill */
    protected $p = 0;
    protected $range = -1; // how deep have we gone

    public function reset()
    {
        $this->clear();
    }

    public function clear()
    {
        $this->p = 0;
        $this->data = array();
    }

    /** Get and remove first element in queue */
    public function remove()
    {
        $o = $this->elementAt(0);
        $this->p++;
        // have we hit end of buffer?
        if ($this->p == count($this->data)) {
            // if so, it's an opportunity to start filling at index 0 again
            $this->clear(); // size goes to 0, but retains memory
        }
        return $o;
    }

    public function add($o)
    {
        $this->data[] = $o;
    }

    public function size()
    {
        return count($this->data) - $this->p;
    }

    public function range()
    {
        return $this->range;
    }

    public function head()
    {
        return $this->elementAt(0);
    }

    /** Return element i elements ahead of current element.  i==0 gets
     *  current element.  This is not an absolute index into the data list
     *  since p defines the start of the real list.
     */
    public function elementAt($i)
    {
        $absIndex = $this->p + $i;
        if ($absIndex >= count($this->data)) {
            throw new \OutOfRangeException("queue index " + $absIndex + " > last index " + (count($this->data) - 1));
        }
        if ($absIndex < 0) {
            throw new \OutOfRangeException("queue index " + $absIndex + " < 0");
        }
        if ($absIndex > $this->range)
            $this->range = $absIndex;
        return $this->data[$absIndex];
    }

    /** Return string of current buffer contents; non-destructive */
    public function toString()
    {
        $buf = "";
        $n = $this->size();
        for ($i = 0; $i < $n; $i++) {
            $buf .= $this->elementAt($i);
            if (($i + 1) < $n)
                $buf .= "";
        }
        return $buf;
    }

}