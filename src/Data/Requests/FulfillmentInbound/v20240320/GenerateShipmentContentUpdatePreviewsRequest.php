<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\BoxUpdateInputSchemaList;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\ItemInputSchemaList;

class GenerateShipmentContentUpdatePreviewsRequest extends BaseRequest
{
    public function __construct(
        public BoxUpdateInputSchemaList $boxes,
        public ItemInputSchemaList $items,
    ) {
    }
}
