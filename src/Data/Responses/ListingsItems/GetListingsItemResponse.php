<?php

namespace Jasara\AmznSPA\Data\Responses\ListingsItems;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\ListingsItemSchema;

class GetListingsItemResponse extends BaseResponse
{
    public ?ListingsItemSchema $item;
}
