<?php

namespace Jasara\AmznSPA\Data\Requests\ListingsItems;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\PatchListSchema;

class ListingsItemPatchRequest extends BaseRequest
{
    public function __construct(
        public string $product_type,

        public PatchListSchema $patches,
    ) {
    }
}
