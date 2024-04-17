<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LabelFormatOptionSchema extends BaseSchema
{
    public function __construct(
        public ?bool $include_packing_slip_with_label,
        #[StringEnumValidator(AmazonEnums::LABEL_FORMAT)]
        public ?string $label_format,
    ) {
    }
}
