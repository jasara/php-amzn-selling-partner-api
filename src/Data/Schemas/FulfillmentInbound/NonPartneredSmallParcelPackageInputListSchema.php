<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<NonPartneredSmallParcelPackageInputSchema>
 */
class NonPartneredSmallParcelPackageInputListSchema extends TypedCollection
{
    public const string ITEM_CLASS = NonPartneredSmallParcelPackageInputSchema::class;
}
