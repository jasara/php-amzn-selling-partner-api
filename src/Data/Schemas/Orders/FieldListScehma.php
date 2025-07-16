<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FieldScehma>
 */
class FieldListScehma extends TypedCollection
{
    public const ITEM_CLASS = FieldScehma::class;
}