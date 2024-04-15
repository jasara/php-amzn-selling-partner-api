<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\DataTransferObject;

class LabelCustomizationSchema extends DataTransferObject
{
    #[MaxLengthValidator(14)]
    public ?string $custom_text_for_label;

    public ?string $standard_id_for_label;
}
