<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeesEstimateErrorSchema extends BaseSchema
{
    public function __construct(
        public string $type,
        public string $code,
        public string $message,
        public array $detail,
    ) {
    }
}
