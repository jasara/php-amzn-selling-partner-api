<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\Sales;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Sales\OrderMetricsListSchema;

class GetOrderMetricsResponse extends BaseResponse
{
    public function __construct(
        public ?OrderMetricsListSchema $payload = null,
    ) {}

}
