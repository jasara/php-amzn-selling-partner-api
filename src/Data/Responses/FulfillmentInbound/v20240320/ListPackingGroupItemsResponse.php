<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\ItemListSchema;
use Jasara\AmznSPA\Data\Schemas\PaginationSchema;

class ListPackingGroupItemsResponse extends BaseResponse
{
    public function __construct(
        public ItemListSchema $items,
        public ?PaginationSchema $pagination,
    ) {
    }
}
