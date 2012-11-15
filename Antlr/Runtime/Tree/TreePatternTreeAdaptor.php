<?php

namespace Antlr\Runtime\Tree;

use Antlr\Runtime\Token;

class TreePatternTreeAdaptor extends CommonTreeAdaptor
{
    public function create(Token $payload = null)
    {
        return new TreePattern($payload);
    }
}