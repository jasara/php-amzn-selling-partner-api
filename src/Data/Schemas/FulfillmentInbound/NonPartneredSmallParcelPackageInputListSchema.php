<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<NonPartneredSmallParcelPackageInputSchema>
 */
class NonPartneredSmallParcelPackageInputListSchema extends TypedCollection
{
    protected string $item_class = NonPartneredSmallParcelPackageInputSchema::class;
}
