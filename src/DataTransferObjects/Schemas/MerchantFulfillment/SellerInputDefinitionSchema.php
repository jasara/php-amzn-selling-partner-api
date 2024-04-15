<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class SellerInputDefinitionSchema extends DataTransferObject
{
    public bool $is_required;

    public string $data_type;

    #[CastWith(ArrayCaster::class, itemType: ConstraintSchema::class)]
    public ConstraintListSchema $constraints;

    public string $input_display_text;

    #[StringEnumValidator(['SHIPMENT_LEVEL', 'ITEM_LEVEL'])]
    public ?string $input_target_type;

    public AdditionalSellerInputSchema $stored_value;

    public ?string $restricted_set_values;
}
