<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetFulfillmentPreviewResultSchema extends BaseSchema
{
    public function __construct(
        public ?FulfillmentPreviewListSchema $fulfillment_previews,
    ) {
    }
}
