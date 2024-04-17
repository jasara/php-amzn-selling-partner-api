<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<PalletSchema>
 */
class PalletListSchema extends TypedCollection
{
    protected string $item_class = PalletSchema::class;
}
