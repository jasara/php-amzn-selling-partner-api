<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class PrepDetailsSchema extends DataTransferObject
{
    #[StringEnumValidator(AmazonEnums::PREP_INSTRUCTIONS)]
    public ?string $prep_instruction;

    #[StringEnumValidator(['AMAZON', 'SELLER'])]
    public ?string $prep_owner;
}
