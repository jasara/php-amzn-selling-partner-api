<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\CatalogItems\v20220401;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\v20220401\ItemSchema;

class GetCatalogItemResponse extends BaseResponse
{
    public ?ItemSchema $item;
}
