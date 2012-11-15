<?php

namespace Antlr\Runtime\Tree;

use Antlr\Runtime\Token;

class TreePattern extends CommonTree
{

    public $label;
    public $hasTextArg;

    public function __construct(Token $payload = null)
    {
        parent::__construct(null, $payload);
    }

    public function toString()
    {
        if ($this->label != null) {
            return "%" + $this->label + ":" + parent::toString();
        } else {
            return parent::toString();
        }
    }

}