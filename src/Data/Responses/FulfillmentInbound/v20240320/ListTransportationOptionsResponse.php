<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\TransportationOptionSchemaList;
use Jasara\AmznSPA\Data\Schemas\PaginationSchema;

class ListTransportationOptionsResponse extends BaseResponse
{
    public function __construct(
        public TransportationOptionSchemaList $transportation_options,
        public ?PaginationSchema $pagination,
    ) {
    }
}
