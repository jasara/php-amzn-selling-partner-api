<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<PartneredSmallParcelPackageOutputSchema>
 */
class PartneredSmallParcelPackageOutputListSchema extends TypedCollection
{
    public const ITEM_CLASS = PartneredSmallParcelPackageOutputSchema::class;
}
