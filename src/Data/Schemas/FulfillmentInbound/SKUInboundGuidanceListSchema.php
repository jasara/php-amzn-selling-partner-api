<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<SkuInboundGuidanceSchema>
 */
class SkuInboundGuidanceListSchema extends TypedCollection
{
    protected string $item_class = SkuInboundGuidanceSchema::class;
}
