<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class LabelFormatOptionSchema extends DataTransferObject
{
    public ?bool $include_packing_slip_with_label;

    #[StringEnumValidator(AmazonEnums::LABEL_FORMAT)]
    public ?string $label_format;
}
