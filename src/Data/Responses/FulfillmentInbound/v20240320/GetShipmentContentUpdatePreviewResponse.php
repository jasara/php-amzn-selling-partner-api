<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\ContentUpdatePreviewSchema;

class GetShipmentContentUpdatePreviewResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public ContentUpdatePreviewSchema $content_update_preview,
    ) {
    }

    public static function mapResponseToParameter(): string
    {
        return 'content_update_preview';
    }
}
