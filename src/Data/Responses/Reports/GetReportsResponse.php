<?php

namespace Jasara\AmznSPA\Data\Responses\Reports;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Reports\ReportListSchema;
use Jasara\AmznSPA\Data\Schemas\Reports\ReportSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetReportsResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: ReportSchema::class)]
    public ReportListSchema $reports;

    public ?string $next_token;
}
