<?php

namespace Antlr\Runtime\Tree;

use ArrayObject;

class PatternContextVisitor implements WizardContextVisitor
{
    /** @var TreeWizard */
    protected $wizard;
    /** @var TreePattern */
    protected $tpattern;
    protected $subtrees = array();
    protected $delegate = null;
    protected $labels = null;

    public function __construct($wizard, $tpattern, ArrayObject $labels = null, WizardContextVisitor $delegatee = null)
    {
        $this->wizard = $wizard;
        $this->tpattern = $tpattern;
        $this->delegate = $delegatee;
        $this->labels = $labels;
    }

    public function visit($t, $parent = null, $childIndex = null, $unusedLabels = null)
    {
        if ( $this->wizard->parse($t, $this->tpattern, $this->labels) ) {
            if ($this->delegate) {
                $this->delegate->visit($t, $parent, $childIndex, $this->labels);
            } else {
                $this->subtrees[] = $t;
            }
        }
    }

    public function getSubstrees()
    {
        return $this->subtrees;
    }
}