<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\PlacementOptionSchemaList;
use Jasara\AmznSPA\Data\Schemas\PaginationSchema;

class ListPlacementOptionsResponse extends BaseResponse
{
    public function __construct(
        public PlacementOptionSchemaList $placement_options,
        public ?PaginationSchema $pagination,
    ) {
    }
}
