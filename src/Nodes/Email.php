<?php

namespace Naugrim\BMEcat\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Concerns\HasStringValue;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class Email implements NodeInterface
{
    use HasStringValue;
}
