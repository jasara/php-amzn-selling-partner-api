<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\InboundPlanSummarySchemaList;
use Jasara\AmznSPA\Data\Schemas\PaginationSchema;

class ListInboundPlansResponse extends BaseResponse
{
    public function __construct(
        public ?InboundPlanSummarySchemaList $inbound_plans,
        public ?PaginationSchema $pagination,
    ) {
    }
}
