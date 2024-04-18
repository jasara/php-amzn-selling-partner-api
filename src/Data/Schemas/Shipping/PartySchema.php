<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PartySchema extends BaseSchema
{
    public function __construct(
        #[MaxLengthValidator(10)]
        public ?string $account_id,
    ) {
    }
}
