<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\MskuPrepDetailSchemaList;

class ListPrepDetailsResponse extends BaseResponse
{
    public function __construct(
        public MskuPrepDetailSchemaList $msku_prep_details,
    ) {
    }
}
