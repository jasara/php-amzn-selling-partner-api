<?php

namespace Jasara\AmznSPA\Data\Schemas;

use Jasara\AmznSPA\Data\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ContactSchema extends DataTransferObject
{
    #[MaxLengthValidator(50)]
    public string $name;

    #[MaxLengthValidator(20)]
    public string $phone;

    #[MaxLengthValidator(50)]
    public string $email;

    #[MaxLengthValidator(20)]
    public ?string $fax;
}
