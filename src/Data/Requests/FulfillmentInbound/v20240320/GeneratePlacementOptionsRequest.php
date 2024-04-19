<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\CustomPlacementInputListSchema;

class GeneratePlacementOptionsRequest extends BaseRequest
{
    public function __construct(
        public ?CustomPlacementInputListSchema $custom_placement,
    ) {
    }
}
