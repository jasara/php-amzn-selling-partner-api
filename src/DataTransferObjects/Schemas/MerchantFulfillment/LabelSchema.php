<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class LabelSchema extends DataTransferObject
{
    #[MaxLengthValidator(14)]
    public ?string $custom_text_for_label;

    public DimensionsSchema $dimensions;

    public FileContentsSchema $file_contents;

    #[StringEnumValidator(AmazonEnums::LABEL_FORMAT)]
    public ?string $label_format;

    public ?string $standard_id_for_label;
}
