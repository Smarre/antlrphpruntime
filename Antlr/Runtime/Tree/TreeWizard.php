<?php

/*
  [The "BSD licence"]
  Copyright (c) 2005-2008 Terence Parr
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

namespace Antlr\Runtime\Tree;

use Antlr\Runtime\Token;
use ArrayObject;

/** Build and navigate trees with this object.  Must know about the names
 *  of tokens so you have to pass in a map or array of token names (from which
 *  this class can build the map).  I.e., Token DECL means nothing unless the
 *  class can translate it to a token type.
 *
 *  In order to create nodes and navigate, this class needs a TreeAdaptor.
 *
 *  This class can build a token type -> node index for repeated use or for
 *  iterating over the various nodes with a particular type.
 *
 *  This class works in conjunction with the TreeAdaptor rather than moving
 *  all this functionality into the adaptor.  An adaptor helps build and
 *  navigate trees using methods.  This class helps you do it with string
 *  patterns like "(A B C)".  You can create a tree from that pattern or
 *  match subtrees against it.
 */

class TreeWizard
{
    protected $adaptor;
    protected $tokenNameToTypeMap;

//	public interface ContextVisitor {
//		// TODO: should this be called visit or something else?
//		public void visit(Object t, Object parent, int childIndex, Map labels);
//	}
//
//	public static abstract class Visitor implements ContextVisitor {
//		public void visit(Object t, Object parent, int childIndex, Map labels) {
//			visit(t);
//		}
//		public abstract void visit(Object t);
//	}
//
//	/** When using %label:TOKENNAME in a tree for parse(), we must
//	 *  track the label.
//	 */
//	public static class TreePattern extends CommonTree {
//		public String label;
//		public boolean hasTextArg;
//		public TreePattern(Token payload) {
//			super(payload);
//		}
//		public String toString() {
//			if ( label!=null ) {
//				return "%"+label+":"+super.toString();
//			}
//			else {
//				return super.toString();
//			}
//		}
//	}
//
//	public static class WildcardTreePattern extends TreePattern {
//		public WildcardTreePattern(Token payload) {
//			super(payload);
//		}
//	}
//
//	/** This adaptor creates TreePattern objects for use during scan() */
//	public static class TreePatternTreeAdaptor extends CommonTreeAdaptor {
//		public Object create(Token payload) {
//			return new TreePattern(payload);
//		}
//	}
    // TODO: build indexes for the wizard

    /** During fillBuffer(), we can make a reverse index from a set
     *  of token types of interest to the list of indexes into the
     *  node stream.  This lets us convert a node pointer to a
     *  stream index semi-efficiently for a list of interesting
     *  nodes such as function definition nodes (you'll want to seek
     *  to their bodies for an interpreter).  Also useful for doing
     *  dynamic searches; i.e., go find me all PLUS nodes.
      protected Map tokenTypeToStreamIndexesMap;

      /** If tokenTypesToReverseIndex set to INDEX_ALL then indexing
     *  occurs for all token types.
      public static final Set INDEX_ALL = new HashSet();

      /** A set of token types user would like to index for faster lookup.
     *  If this is INDEX_ALL, then all token types are tracked.  If null,
     *  then none are indexed.
      protected Set tokenTypesToReverseIndex = null;
     */
    // TODO: Check for all code where this is called with the inverse of $tokenNameToTypeMap and call array_flip()
    public function __construct(TreeAdaptor $adaptor, array $tokenNameToTypeMap = null)
    {
        $this->adaptor = $adaptor;
        $this->tokenNameToTypeMap = array_flip($tokenNameToTypeMap);
    }

    /** Using the map of token names to token types, return the type. */
    public function getTokenType($tokenName)
    {
        if ($this->tokenNameToTypeMap == null) {
            return Token::INVALID_TOKEN_TYPE;
        }
        $ttypeI = $this->tokenNameToTypeMap[$tokenName];
        if ($ttypeI != null) {
            return $ttypeI;
        }
        return Token::INVALID_TOKEN_TYPE;
    }

    /** Walk the entire tree and make a node name to nodes mapping.
     *  For now, use recursion but later nonrecursive version may be
     *  more efficient.  Returns Map<Integer, List> where the List is
     *  of your AST node type.  The Integer is the token type of the node.
     *
     *  TODO: save this index so that find and visit are faster
     */
    public function index($t)
    {
        $m = array();
        $this->_index($t, $m);
        return $m;
    }

    /** Do the work for index */
    protected function _index($t, array &$map)
    {
        if ($t == null) {
            return;
        }
        $ttype = $this->adaptor->getType($t);
        if (!isset($map[$ttype])) {
            $map[$ttype] = array();
        }
        $map[$ttype][] = $t;
        $n = $this->adaptor->getChildCount($t);
        for ($i = 0; $i < $n; ++$i) {
            $child = $this->adaptor->getChild($t, $i);
            $this->_index($child, $map);
        }
    }

    /** Return a List of tree nodes with token type ttype */
    public function findByTokenType($t, $ttype)
    {
        $visitor = new TypeContextVisitor();
        $this->visitByType($t, $ttype, $visitor);
        return $visitor->getNodes();
    }

    /** Return a List of subtrees matching pattern. */
    public function findByPattern($t, $pattern)
    {
        $subtrees = array();
        // Create a TreePattern from the pattern
        $parser = new TreePatternParser(new TreePatternLexer($pattern), $this, new TreePatternTreeAdaptor());
        $tpattern = $parser->pattern();
        // don't allow invalid patterns
        if ($tpattern == null || $tpattern->isNil() || $tpattern instanceof WildcardTreePattern) {
            return null;
        }
        $rootTokenType = $tpattern->getType();
        $visitor = new PatternContextVisitor($this, $tpattern);
        $this->visitByType($t, $rootTokenType, $visitor);
        return $visitor->getSubstrees();
    }

    public function findFirst($t, $ttype)
    {
        return null;
    }

    /** Visit every ttype node in t, invoking the visitor.  This is a quicker
     *  version of the general visit(t, pattern) method.  The labels arg
     *  of the visitor action method is never set (it's null) since using
     *  a token type rather than a pattern doesn't let us set a label.
     */
    public function visitByType($t, $ttype, WizardContextVisitor $visitor)
    {
        $this->_visit($t, null, 0, $ttype, $visitor);
    }

    /** Do the recursive work for visit */
    protected function _visit($t, $parent, $childIndex, $ttype, WizardContextVisitor $visitor)
    {
        if ($t == null) {
            return;
        }
        if ($this->adaptor->getType($t) == $ttype) {
            $visitor->visit($t, $parent, $childIndex, null);
        }
        $n = $this->adaptor->getChildCount($t);
        for ($i = 0; $i < $n; $i++) {
            $child = $this->adaptor->getChild($t, $i);
            $this->_visit($child, $t, $i, $ttype, $visitor);
        }
    }

    /** For all subtrees that match the pattern, execute the visit action.
     *  The implementation uses the root node of the pattern in combination
     *  with visit(t, ttype, visitor) so nil-rooted patterns are not allowed.
     *  Patterns with wildcard roots are also not allowed.
     */
    public function visitByPattern($t, $pattern, WizardContextVisitor $visitor)
    {
        // Create a TreePattern from the pattern
        $tokenizer = new TreePatternLexer($pattern);
        $parser = new TreePatternParser($tokenizer, $this, new TreePatternTreeAdaptor());
        $tpattern = $parser->pattern();
        // don't allow invalid patterns
        if ($tpattern == null || $tpattern->isNil() || $tpattern instanceof WildcardTreePattern) {
            return null;
        }
        $labels = new ArrayObject();
        $rootTokenType = $tpattern->getType();

        $this->visitByType($t, $rootTokenType, new PatternContextVisitor($this, $tpattern, $labels, $visitor));
    }

    /** Given a pattern like (ASSIGN %lhs:ID %rhs:.) with optional labels
     *  on the various nodes and '.' (dot) as the node/subtree wildcard,
     *  return true if the pattern matches and fill the labels Map with
     *  the labels pointing at the appropriate nodes.  Return false if
     *  the pattern is malformed or the tree does not match.
     *
     *  If a node specifies a text arg in pattern, then that must match
     *  for that node in t.
     *
     *  TODO: what's a better way to indicate bad pattern? Exceptions are a hassle
     */
    public function parse($t, $pattern, ArrayObject $labels = null)
    {
        if (is_string($pattern)) {
            $tokenizer = new TreePatternLexer($pattern);
            $parser = new TreePatternParser($tokenizer, $this, new TreePatternTreeAdaptor());
            $tpattern = $parser->pattern();
        } else {
            $tpattern = $pattern;
        }
        /*
          System.out.println("t="+((Tree)t).toStringTree());
          System.out.println("scant="+tpattern.toStringTree());
         */
        return $this->_parse($t, $tpattern, $labels);
    }

    /** Do the work for parse. Check to see if the t2 pattern fits the
     *  structure and token types in t1.  Check text if the pattern has
     *  text arguments on nodes.  Fill labels map with pointers to nodes
     *  in tree matched against nodes in pattern with labels.
     */
    protected function _parse($t1, $tpattern, ArrayObject $labels = null)
    {
        // make sure both are non-null
        if ($t1 == null || $tpattern == null) {
            return false;
        }
        // check roots (wildcard matches anything)
        if ( !($tpattern instanceof WildcardTreePattern)) {
            if ($this->adaptor->getType($t1) != $tpattern->getType())
                return false;
            // if pattern has text, check node text
            if ($tpattern->hasTextArg && !$this->adaptor->getText($t1) == $tpattern->getText()) {
                return false;
            }
        }
        if ($tpattern->label != null && $labels != null) {
            // map label in pattern to node in t1
            $labels[$tpattern->label] = $t1;
        }
        // check children
        $n1 = $this->adaptor->getChildCount($t1);
        $n2 = $tpattern->getChildCount();
        if ($n1 != $n2) {
            return false;
        }
        for ($i = 0; $i < $n1; ++$i) {
            $child1 = $this->adaptor->getChild($t1, $i);
            $child2 = $tpattern->getChild($i);
            if (!$this->_parse($child1, $child2, $labels)) {
                return false;
            }
        }
        return true;
    }

    /** Create a tree or node from the indicated tree pattern that closely
     *  follows ANTLR tree grammar tree element syntax:
     *
     * 		(root child1 ... child2).
     *
     *  You can also just pass in a node: ID
     * 
     *  Any node can have a text argument: ID[foo]
     *  (notice there are no quotes around foo--it's clear it's a string).
     *
     *  nil is a special name meaning "give me a nil node".  Useful for
     *  making lists: (nil A B C) is a list of A B C.
     */
    public function create($pattern)
    {
        $tokenizer = new TreePatternLexer($pattern);
        $parser = new TreePatternParser($tokenizer, $this, $this->adaptor);
        return $parser->pattern();
    }

    public static function equals($t1, $t2, TreeAdaptor $adaptor)
    {
        // make sure both are non-null
        if ($t1 == null || $t2 == null) {
            return false;
        }
        // check roots
        if ($adaptor->getType($t1) != $adaptor->getType($t2)) {
            return false;
        }
        if (!$adaptor->getText($t1) == $adaptor->getText($t2)) {
            return false;
        }
        // check children
        $n1 = $adaptor->getChildCount($t1);
        $n2 = $adaptor->getChildCount($t2);
        if ($n1 != $n2) {
            return false;
        }
        for ($i = 0; $i < $n1; $i++) {
            $child1 = $adaptor->getChild($t1, $i);
            $child2 = $adaptor->getChild($t2, $i);
            if (!self::equals($child1, $child2, $adaptor)) {
                return false;
            }
        }
        return true;
    }

    // TODO: next stuff taken from CommonTreeNodeStream

    /** Given a node, add this to the reverse index tokenTypeToStreamIndexesMap.
     *  You can override this method to alter how indexing occurs.  The
     *  default is to create a
     *
     *    Map<Integer token type,ArrayList<Integer stream index>>
     *
     *  This data structure allows you to find all nodes with type INT in order.
     *
     *  If you really need to find a node of type, say, FUNC quickly then perhaps
     *
     *    Map<Integertoken type,Map<Object tree node,Integer stream index>>
     *
     *  would be better for you.  The interior maps map a tree node to
     *  the index so you don't have to search linearly for a specific node.
     *
     *  If you change this method, you will likely need to change
     *  getNodeIndex(), which extracts information.
      protected void fillReverseIndex(Object node, int streamIndex) {
      //System.out.println("revIndex "+node+"@"+streamIndex);
      if ( tokenTypesToReverseIndex==null ) {
      return; // no indexing if this is empty (nothing of interest)
      }
      if ( tokenTypeToStreamIndexesMap==null ) {
      tokenTypeToStreamIndexesMap = new HashMap(); // first indexing op
      }
      int tokenType = adaptor.getType(node);
      Integer tokenTypeI = new Integer(tokenType);
      if ( !(tokenTypesToReverseIndex==INDEX_ALL ||
      tokenTypesToReverseIndex.contains(tokenTypeI)) )
      {
      return; // tokenType not of interest
      }
      Integer streamIndexI = new Integer(streamIndex);
      ArrayList indexes = (ArrayList)tokenTypeToStreamIndexesMap.get(tokenTypeI);
      if ( indexes==null ) {
      indexes = new ArrayList(); // no list yet for this token type
      indexes.add(streamIndexI); // not there yet, add
      tokenTypeToStreamIndexesMap.put(tokenTypeI, indexes);
      }
      else {
      if ( !indexes.contains(streamIndexI) ) {
      indexes.add(streamIndexI); // not there yet, add
      }
      }
      }

      /** Track the indicated token type in the reverse index.  Call this
     *  repeatedly for each type or use variant with Set argument to
     *  set all at once.
     * @param tokenType
      public void reverseIndex(int tokenType) {
      if ( tokenTypesToReverseIndex==null ) {
      tokenTypesToReverseIndex = new HashSet();
      }
      else if ( tokenTypesToReverseIndex==INDEX_ALL ) {
      return;
      }
      tokenTypesToReverseIndex.add(new Integer(tokenType));
      }

      /** Track the indicated token types in the reverse index. Set
     *  to INDEX_ALL to track all token types.
      public void reverseIndex(Set tokenTypes) {
      tokenTypesToReverseIndex = tokenTypes;
      }

      /** Given a node pointer, return its index into the node stream.
     *  This is not its Token stream index.  If there is no reverse map
     *  from node to stream index or the map does not contain entries
     *  for node's token type, a linear search of entire stream is used.
     *
     *  Return -1 if exact node pointer not in stream.
      public int getNodeIndex(Object node) {
      //System.out.println("get "+node);
      if ( tokenTypeToStreamIndexesMap==null ) {
      return getNodeIndexLinearly(node);
      }
      int tokenType = adaptor.getType(node);
      Integer tokenTypeI = new Integer(tokenType);
      ArrayList indexes = (ArrayList)tokenTypeToStreamIndexesMap.get(tokenTypeI);
      if ( indexes==null ) {
      //System.out.println("found linearly; stream index = "+getNodeIndexLinearly(node));
      return getNodeIndexLinearly(node);
      }
      for (int i = 0; i < indexes.size(); i++) {
      Integer streamIndexI = (Integer)indexes.get(i);
      Object n = get(streamIndexI.intValue());
      if ( n==node ) {
      //System.out.println("found in index; stream index = "+streamIndexI);
      return streamIndexI.intValue(); // found it!
      }
      }
      return -1;
      }

     */
}
