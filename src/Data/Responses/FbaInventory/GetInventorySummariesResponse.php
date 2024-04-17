<?php

namespace Jasara\AmznSPA\Data\Responses\FbaInventory;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FbaInventory\GetInventorySummariesResultSchema;
use Jasara\AmznSPA\Data\Schemas\PaginationSchema;

class GetInventorySummariesResponse extends BaseResponse
{
    public function __construct(
        public ?GetInventorySummariesResultSchema $payload,
        public ?PaginationSchema $pagination,
    ) {
    }
}
