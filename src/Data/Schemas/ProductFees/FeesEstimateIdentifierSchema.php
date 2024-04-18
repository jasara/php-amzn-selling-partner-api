<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeesEstimateIdentifierSchema extends BaseSchema
{
    public function __construct(
        public ?string $marketplace_id,
        public ?string $seller_id,
        public ?string $id_type,
        public ?string $id_value,
        public ?bool $is_amazon_fulfilled,
        public ?PriceToEstimateFeesSchema $PriceToEstimateFees,
        public ?string $seller_input_identifier,
        #[StringEnumValidator(['FBA_CORE', 'FBA_SNL', 'FBA_EFN'])]
        public ?string $optional_fulfillment_program,
    ) {
    }
}
