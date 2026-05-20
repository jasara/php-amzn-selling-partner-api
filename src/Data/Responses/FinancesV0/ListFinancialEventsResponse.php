<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\FinancesV0;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FinancesV0\ListFinancialEventsPayloadSchema;

class ListFinancialEventsResponse extends BaseResponse
{
    public function __construct(
        public ?ListFinancialEventsPayloadSchema $payload = null,
    ) {}

}
