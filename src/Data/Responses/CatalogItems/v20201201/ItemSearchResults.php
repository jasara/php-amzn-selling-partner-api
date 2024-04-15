<?php

namespace Jasara\AmznSPA\Data\Responses\CatalogItems\v20201201;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\CatalogItems\RefinementsSchema;
use Jasara\AmznSPA\Data\Schemas\CatalogItems\v20201201\ItemListSchema;
use Jasara\AmznSPA\Data\Schemas\CatalogItems\v20201201\ItemSchema;
use Jasara\AmznSPA\Data\Schemas\PaginationSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class ItemSearchResults extends BaseResponse
{
    public ?int $number_of_results;

    public ?PaginationSchema $pagination;

    public ?RefinementsSchema $refinements;

    #[CastWith(ArrayCaster::class, itemType: ItemSchema::class)]
    public ?ItemListSchema $items;
}
