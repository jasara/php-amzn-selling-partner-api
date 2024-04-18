<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CurrencySchema extends BaseSchema
{
    public function __construct(
        public float $value,
        #[MaxLengthValidator(3)]
        public string $unit,
    ) {
    }
}
