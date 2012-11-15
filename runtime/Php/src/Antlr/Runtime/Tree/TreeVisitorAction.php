<?php
namespace Antlr\Runtime\Tree;

/**
 * How to execute code for node t when a visitor visits node t.  Execute
 * pre() before visiting children and execute post() after visiting children.
 */
interface TreeVisitorAction {
    /**
     *  Execute an action before visiting children of t.  Return t or
     *  a rewritten t.  It is up to the visitor to decide what to do
     *  with the return value.  Children of returned value will be
     *  visited if using TreeVisitor.visit().
     */
    public function pre($t);

    /**
     *  Execute an action after visiting children of t.  Return t or
     *  a rewritten t.  It is up to the visitor to decide what to do
     *  with the return value.
     */
    public function post($t);
}
