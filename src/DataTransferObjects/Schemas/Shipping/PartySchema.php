<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\DataTransferObject;

class PartySchema extends DataTransferObject
{
    #[MaxLengthValidator(10)]
    public ?string $account_id;
}
