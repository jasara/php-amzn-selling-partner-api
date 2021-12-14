<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\ListingsItems;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\ListingsItemSchema;

class GetListingsItemResponse extends BaseResponse
{
    public ?ListingsItemSchema $item;
}
