<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class AmazonPrepFeesDetailsSchema extends DataTransferObject
{
    #[StringEnumValidator(AmazonEnums::PREP_INSTRUCTIONS)]
    public ?string $prep_instruction;

    public ?AmountSchema $fee_per_unit;
}
