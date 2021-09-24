<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AmountSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class AmazonPrepFeesDetailsSchema extends DataTransferObject
{
    #[StringEnumValidator(AmazonEnums::PREP_INSTRUCTIONS)]
    public ?string $prep_instruction;

    public ?AmountSchema $fee_per_unit;
}
