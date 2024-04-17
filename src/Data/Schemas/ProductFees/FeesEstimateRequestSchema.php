<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeesEstimateRequestSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public ?bool $is_amazon_fulfilled,
        public PriceToEstimateFeesSchema $price_to_estimate_fees,
        public string $identifier,
        #[StringEnumValidator(['FBA_CORE', 'FBA_SNL', 'FBA_EFN'])]
        public ?string $optional_fulfillment_program,
    ) {
    }
}
