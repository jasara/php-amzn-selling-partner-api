<?php

namespace Jasara\AmznSPA\Data\Responses\CatalogItems\v20220401;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\CatalogItems\RefinementsSchema;
use Jasara\AmznSPA\Data\Schemas\CatalogItems\v20220401\ItemListSchema;
use Jasara\AmznSPA\Data\Schemas\PaginationSchema;

class ItemSearchResults extends BaseResponse
{
    public function __construct(
        public ?int $number_of_results,
        public ?PaginationSchema $pagination,
        public ?RefinementsSchema $refinements,

        public ?ItemListSchema $items,
    ) {
    }
}
