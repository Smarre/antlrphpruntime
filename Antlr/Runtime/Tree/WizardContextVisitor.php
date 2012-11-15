<?php

namespace Antlr\Runtime\Tree;

interface WizardContextVisitor
{
    public function visit($t, $parent = null, $childIndex = null, $labels = null);
}