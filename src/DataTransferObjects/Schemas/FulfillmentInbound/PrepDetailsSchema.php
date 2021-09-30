<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use ArrayObject;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class PrepDetailsSchema extends DataTransferObject
{
    #[StringEnumValidator(AmazonEnums::PREP_INSTRUCTIONS)]
    public string $prep_instruction;

    #[StringEnumValidator(['AMAZON', 'SELLER'])]
    public string $prep_owner;

    public function toArrayObject(): ArrayObject
    {
        return new ArrayObject(array_filter([
            'PrepInstruction' => $this->prep_instruction,
            'PrepOwner' => $this->prep_owner,
        ]));
    }
}
