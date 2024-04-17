<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<PalletSchema>
 */
class PalletListSchema extends TypedCollection
{
    public const string ITEM_CLASS = PalletSchema::class;
}
