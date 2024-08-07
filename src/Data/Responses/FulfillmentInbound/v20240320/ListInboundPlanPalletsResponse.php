<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\PalletSchemaList;
use Jasara\AmznSPA\Data\Schemas\PaginationSchema;

class ListInboundPlanPalletsResponse extends BaseResponse
{
    public function __construct(
        public PalletSchemaList $pallets,
        public ?PaginationSchema $pagination,
    ) {
    }
}
