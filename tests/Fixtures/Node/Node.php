<?php

namespace Naugrim\BMEcat\Tests\Fixtures\Node;

use Naugrim\BMEcat\Nodes\AbstractNode;

class Node extends AbstractNode
{
    public $someString;

    public $someArray;

    public $anotherNode;

    public $someFloat;

    public function setNoArguments()
    {
        return $this;
    }

    public function setNoTypeHint($something)
    {
        return $this;
    }

    public function setScalarTypeHint(string $someString)
    {
        $this->someString = $someString;
        return $this;
    }

    public function setMatchingTypeHintFloat(float $someFloat)
    {
        $this->someFloat = $someFloat;
        return $this;
    }

    public function setMatchingTypeHintArray(array $someArray)
    {
        $this->someArray = $someArray;
        return $this;
    }

    public function setMatchingTypeHintNode(Node $anotherNode)
    {
        $this->anotherNode = $anotherNode;
        return $this;
    }
}
