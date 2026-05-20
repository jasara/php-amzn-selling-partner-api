<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Sales;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetOrderMetricsResponseSchema extends BaseSchema
{
    public function __construct(
        public ?OrderMetricsListSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
