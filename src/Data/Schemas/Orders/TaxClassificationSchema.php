<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TaxClassificationSchema extends BaseSchema
{
    public function __construct(
        public ?string $name,
        public ?string $value,
    ) {
    }
}
