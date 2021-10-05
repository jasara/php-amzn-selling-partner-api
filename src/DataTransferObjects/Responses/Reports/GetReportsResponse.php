<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Reports;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Reports\ReportListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Reports\ReportSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetReportsResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: ReportSchema::class)]
    public ReportListSchema $reports;

    public ?string $next_token;
}
