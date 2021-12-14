<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductFees;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class FeesEstimateRequestSchema extends DataTransferObject
{
    public string $marketplace_id;

    public ?bool $is_amazon_fulfilled;

    public PriceToEstimateFeesSchema $price_to_estimate_fees;

    public string $identifier;

    #[StringEnumValidator(['FBA_CORE', 'FBA_SNL', 'FBA_EFN'])]
    public ?string $optional_fulfillment_program;
}
