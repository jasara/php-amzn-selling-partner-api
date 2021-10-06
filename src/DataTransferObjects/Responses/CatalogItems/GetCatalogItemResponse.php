<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\CatalogItems;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\ItemSchema;

class GetCatalogItemResponse extends BaseResponse
{
    public ?ItemSchema $item;
}
