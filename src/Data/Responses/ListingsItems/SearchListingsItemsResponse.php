<?php

namespace Jasara\AmznSPA\Data\Responses\ListingsItems;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\ListingsItemSchemaList;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\PaginationSchema;

class SearchListingsItemsResponse extends BaseResponse
{
    public function __construct(
        public int $number_of_results,
        public ?PaginationSchema $pagination,
        public ListingsItemSchemaList $items,
    ) {
    }
}