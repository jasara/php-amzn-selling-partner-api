<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\ItemSchemaList;
use Jasara\AmznSPA\Data\Schemas\PaginationSchema;

class ListShipmentItemsResponse extends BaseResponse
{
    public function __construct(
        public ItemSchemaList $items,
        public ?PaginationSchema $pagination,
    ) {
    }
}
