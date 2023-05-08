<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\ProductTypeDefinitions;

use Illuminate\Support\Collection;
use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductTypeDefinitions\ProductTypeSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class ProductTypeListResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: ProductTypeSchema::class)]
    public Collection $product_types;
}
