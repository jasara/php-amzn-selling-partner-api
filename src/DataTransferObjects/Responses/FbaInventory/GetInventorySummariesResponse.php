<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FbaInventory;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FbaInventory\GetInventorySummariesResultSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\PaginationSchema;

class GetInventorySummariesResponse extends BaseResponse
{
    public ?GetInventorySummariesResultSchema $payload;

    public ?PaginationSchema $pagination;
}
