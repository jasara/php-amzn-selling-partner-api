<?php

namespace Jasara\AmznSPA\Data\Responses\ProductTypeDefinitions;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions\ProductTypeListSchema;

class ProductTypeListResponse extends BaseResponse
{
    public function __construct(
        public ?ProductTypeListSchema $product_types,
    ) {
    }
}
