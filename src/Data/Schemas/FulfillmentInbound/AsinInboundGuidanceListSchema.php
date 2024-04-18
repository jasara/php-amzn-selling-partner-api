<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AsinInboundGuidanceSchema>
 */
class AsinInboundGuidanceListSchema extends TypedCollection
{
    public const ITEM_CLASS = AsinInboundGuidanceSchema::class;
}
