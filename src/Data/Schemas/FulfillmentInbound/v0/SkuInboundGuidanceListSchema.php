<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<SkuInboundGuidanceSchema>
 */
class SkuInboundGuidanceListSchema extends TypedCollection
{
    public const ITEM_CLASS = SkuInboundGuidanceSchema::class;
}
