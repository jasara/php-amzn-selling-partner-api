<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SellerInputDefinitionSchema extends BaseSchema
{
    public function __construct(
        public bool $is_required,
        public string $data_type,

        public ConstraintListSchema $constraints,
        public string $input_display_text,
        #[StringEnumValidator(['SHIPMENT_LEVEL', 'ITEM_LEVEL'])]
        public ?string $input_target_type,
        public AdditionalSellerInputSchema $stored_value,
        public ?string $restricted_set_values,
    ) {
    }
}
