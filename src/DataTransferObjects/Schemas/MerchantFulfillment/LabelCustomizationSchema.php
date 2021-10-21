<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\DataTransferObject;

class LabelCustomizationSchema extends DataTransferObject
{
    #[MaxLengthValidator(14)]
    public ?string $custom_text_for_label;

    public ?string $standard_id_for_label;
}
