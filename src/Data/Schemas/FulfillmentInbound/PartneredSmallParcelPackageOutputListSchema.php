<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<PartneredSmallParcelPackageOutputSchema>
 */
class PartneredSmallParcelPackageOutputListSchema extends TypedCollection
{
    protected string $item_class = PartneredSmallParcelPackageOutputSchema::class;
}
