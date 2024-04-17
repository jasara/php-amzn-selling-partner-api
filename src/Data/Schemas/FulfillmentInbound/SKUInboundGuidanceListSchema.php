<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<SkuInboundGuidanceSchema>
 */
class SkuInboundGuidanceListSchema extends TypedCollection
{
    public const string ITEM_CLASS = SkuInboundGuidanceSchema::class;
}
