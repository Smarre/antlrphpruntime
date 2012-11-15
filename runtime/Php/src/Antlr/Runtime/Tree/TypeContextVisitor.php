<?php

namespace Antlr\Runtime\Tree;

class TypeContextVisitor implements WizardContextVisitor
{
    private $nodes = array();

    public function visit($t, $parent = null, $childIndex = null, $labels = null)
    {
        $this->nodes[] = $t;
    }

    public function getNodes()
    {
        return $this->nodes;
    }
}