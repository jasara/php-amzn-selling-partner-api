<?php

namespace Jasara\AmznSPA\Data\Responses\ProductTypeDefinitions;

use Illuminate\Support\Collection;
use Jasara\AmznSPA\Data\Responses\BaseResponse;

class ProductTypeListResponse extends BaseResponse
{
    public function __construct(
        public ?Collection $product_types,
    ) {
    }
}
