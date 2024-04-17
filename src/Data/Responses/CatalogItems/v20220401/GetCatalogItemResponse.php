<?php

namespace Jasara\AmznSPA\Data\Responses\CatalogItems\v20220401;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\CatalogItems\v20220401\ItemSchema;

class GetCatalogItemResponse extends BaseResponse
{
    public function __construct(
        public ?ItemSchema $item,
    ) {
    }
}
