<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\BoxListSchema;
use Jasara\AmznSPA\Data\Schemas\PaginationSchema;

class ListPackingGroupBoxesResponse extends BaseResponse
{
    public function __construct(
        public BoxListSchema $boxes,
        public ?PaginationSchema $pagination,
    ) {
    }
}
