<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<NonPartneredSmallParcelPackageOutputSchema>
 */
class NonPartneredSmallParcelPackageOutputListSchema extends TypedCollection
{
    protected string $item_class = NonPartneredSmallParcelPackageOutputSchema::class;
}
