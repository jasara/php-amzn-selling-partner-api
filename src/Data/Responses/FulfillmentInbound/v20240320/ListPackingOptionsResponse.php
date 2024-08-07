<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\PackingOptionSchemaList;
use Jasara\AmznSPA\Data\Schemas\PaginationSchema;

class ListPackingOptionsResponse extends BaseResponse
{
    public function __construct(
        public PackingOptionSchemaList $packing_options,
        public ?PaginationSchema $pagination,
    ) {
    }
}
