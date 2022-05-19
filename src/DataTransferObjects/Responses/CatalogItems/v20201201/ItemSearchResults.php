<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\CatalogItems\v20201201;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\RefinementsSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\v20201201\ItemListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\v20201201\ItemSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\PaginationSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class ItemSearchResults extends BaseResponse
{
    public int $number_of_results;

    public ?PaginationSchema $pagination;

    public ?RefinementsSchema $refinements;

    #[CastWith(ArrayCaster::class, itemType: ItemSchema::class)]
    public ItemListSchema $items;
}
