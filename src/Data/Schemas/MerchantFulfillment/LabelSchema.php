<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class LabelSchema extends DataTransferObject
{
    #[MaxLengthValidator(14)]
    public ?string $custom_text_for_label;

    public PackageDimensionsSchema $dimensions;

    public FileContentsSchema $file_contents;

    #[StringEnumValidator(AmazonEnums::LABEL_FORMAT)]
    public ?string $label_format;

    public ?string $standard_id_for_label;
}
