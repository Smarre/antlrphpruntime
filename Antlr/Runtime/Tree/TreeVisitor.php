<?php

namespace Antlr\Runtime\Tree;

/**
 * Do a depth first walk of a tree, applying pre() and post() actions
 * as we discover and finish nodes.
 */
class TreeVisitor
{

    /**
     * @var TreeAdaptor
     */
    protected $adaptor = null;

    public function __construct(TreeAdaptor $adaptor = null)
    {
        if (!$adaptor) {
            $adaptor = new CommonTreeAdaptor();
        }
        $this->adaptor = $adaptor;
    }

    /** Visit every node in tree t and trigger an action for each node
     *  before/after having visited all of its children.
     *  Execute both actions even if t has no children.
     *  If a child visit yields a new child, it can update its
     *  parent's child list or just return the new child.  The
     *  child update code works even if the child visit alters its parent
     *  and returns the new tree.
     *
     *  Return result of applying post action to this node.
     */
    public function visit($t, TreeVisitorAction $action = null)
    {
        // System.out.println("visit "+((Tree)t).toStringTree());
        $isNil = $this->adaptor->isNil($t);
        if ($action != null && !$isNil) {
            $t = $action->pre($t); // if rewritten, walk children of new t
        }
        $n = $this->adaptor->getChildCount($t);
        for ($i = 0; $i < $n; $i++) {
            $child = $this->adaptor->getChild($t, $i);
            $visitResult = $this->visit($child, $action);
            $childAfterVisit = $this->adaptor->getChild($t, $i);
            if ($visitResult != $childAfterVisit) { // result & child differ?
                $this->adaptor->setChild($t, $i, $visitResult);
            }
        }
        if ($action != null && !$isNil) {
            $t = $action->post($t);
        }
        return t;
    }

}
