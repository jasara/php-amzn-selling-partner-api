<?php

namespace Jasara\AmznSPA\Data\Schemas;

use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;

class ContactSchema extends BaseSchema
{
    public function __construct(
        #[MaxLengthValidator(50)]
        public string $name,
        #[MaxLengthValidator(20)]
        public string $phone,
        #[MaxLengthValidator(50)]
        public string $email,
        #[MaxLengthValidator(20)]
        public ?string $fax
    ) {
    }
}
