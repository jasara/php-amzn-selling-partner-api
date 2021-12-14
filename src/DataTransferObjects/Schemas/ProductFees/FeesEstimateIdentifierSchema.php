<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductFees;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class FeesEstimateIdentifierSchema extends DataTransferObject
{
    public ?string $marketplace_id;

    public ?string $seller_id;

    public ?string $id_type;

    public ?string $id_value;

    public ?bool $is_amazon_fulfilled;

    public ?PriceToEstimateFeesSchema $PriceToEstimateFees;

    public ?string $seller_input_identifier;

    #[StringEnumValidator(['FBA_CORE', 'FBA_SNL', 'FBA_EFN'])]
    public ?string $optional_fulfillment_program;
}
