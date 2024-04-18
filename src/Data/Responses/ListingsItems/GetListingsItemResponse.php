<?php

namespace Jasara\AmznSPA\Data\Responses\ListingsItems;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\ListingsItemSchema;

class GetListingsItemResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public ?ListingsItemSchema $item,
    ) {
    }

    public static function mapResponseToParameter(): string
    {
        return 'item';
    }
}
