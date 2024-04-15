<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\DataTransferObject;

class PartySchema extends DataTransferObject
{
    #[MaxLengthValidator(10)]
    public ?string $account_id;
}
