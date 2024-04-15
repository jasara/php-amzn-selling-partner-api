<?php

namespace Jasara\AmznSPA\Data\Responses\ProductTypeDefinitions;

use Illuminate\Support\Collection;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions\ProductTypeSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class ProductTypeListResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: ProductTypeSchema::class)]
    public Collection $product_types;
}
