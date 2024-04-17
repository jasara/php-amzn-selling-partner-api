<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LabelSchema extends BaseSchema
{
    public function __construct(
        #[MaxLengthValidator(14)]
        public ?string $custom_text_for_label,
        public PackageDimensionsSchema $dimensions,
        public FileContentsSchema $file_contents,
        #[StringEnumValidator(AmazonEnums::LABEL_FORMAT)]
        public ?string $label_format,
        public ?string $standard_id_for_label,
    ) {
    }
}
