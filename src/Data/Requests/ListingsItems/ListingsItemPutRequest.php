<?php

namespace Jasara\AmznSPA\Data\Requests\ListingsItems;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\AttributesListSchema;

class ListingsItemPutRequest extends BaseRequest
{
    public function __construct(
        public string $product_type,
        public ?string $requirements,

        public AttributesListSchema $attributes,
    ) {
    }
}
