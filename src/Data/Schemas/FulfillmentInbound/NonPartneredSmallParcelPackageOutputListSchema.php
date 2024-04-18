<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<NonPartneredSmallParcelPackageOutputSchema>
 */
class NonPartneredSmallParcelPackageOutputListSchema extends TypedCollection
{
    public const ITEM_CLASS = NonPartneredSmallParcelPackageOutputSchema::class;
}
