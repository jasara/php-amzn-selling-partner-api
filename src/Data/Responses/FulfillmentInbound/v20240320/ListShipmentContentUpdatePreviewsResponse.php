<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\PaginationSchema;

class ListShipmentContentUpdatePreviewsResponse extends BaseResponse
{
    public function __construct(
        public array $content_update_previews,
        public ?PaginationSchema $pagination,
    ) {
    }
}
