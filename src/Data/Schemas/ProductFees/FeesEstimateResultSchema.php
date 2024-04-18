<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeesEstimateResultSchema extends BaseSchema
{
    public function __construct(
        public ?string $status,
        public ?FeesEstimateIdentifierSchema $fees_estimat_identifier,
        public ?FeesEstimateSchema $fees_estimate,
        public ?FeesEstimateErrorSchema $error,
    ) {
    }
}
