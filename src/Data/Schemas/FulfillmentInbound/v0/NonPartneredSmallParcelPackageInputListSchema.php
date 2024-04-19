<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<NonPartneredSmallParcelPackageInputSchema>
 */
class NonPartneredSmallParcelPackageInputListSchema extends TypedCollection
{
    public const ITEM_CLASS = NonPartneredSmallParcelPackageInputSchema::class;
}
