<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LabelCustomizationSchema extends BaseSchema
{
    public function __construct(
        #[MaxLengthValidator(14)]
        public ?string $custom_text_for_label,
        public ?string $standard_id_for_label,
    ) {
    }
}
