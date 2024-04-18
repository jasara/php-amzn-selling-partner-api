<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<PartneredSmallParcelPackageInputSchema>
 */
class PartneredSmallParcelPackageInputListSchema extends TypedCollection
{
    public const ITEM_CLASS = PartneredSmallParcelPackageInputSchema::class;
}
