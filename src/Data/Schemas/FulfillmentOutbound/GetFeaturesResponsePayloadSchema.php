<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetFeaturesResponsePayloadSchema extends BaseSchema
{
    public function __construct(
        public ?FeaturesListSchema $features,
    ) {
    }
}
