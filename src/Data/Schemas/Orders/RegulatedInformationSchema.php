<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<FieldListScehma>
 */
class RegulatedInformationSchema extends TypedCollection
{
    public const ITEM_CLASS = FieldListScehma::class;
}