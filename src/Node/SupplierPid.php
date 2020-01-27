<?php

namespace Naugrim\BMEcat\Node;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Node\Concerns\HasStringValue;
use Naugrim\BMEcat\Node\Concerns\HasTypeAttribute;

class SupplierPid extends AbstractNode
{
    use HasTypeAttribute, HasStringValue;
}
