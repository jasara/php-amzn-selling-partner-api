<?php

namespace Jasara\AmznSPA\Data\Responses\CatalogItems\v20201201;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\CatalogItems\v20201201\ItemSchema;

class GetCatalogItemResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public ?ItemSchema $item,
    ) {
    }

    public static function mapResponseToParameter(): string
    {
        return 'item';
    }
}
