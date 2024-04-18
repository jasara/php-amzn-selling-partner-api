<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InvalidAsinSchema extends BaseSchema
{
    public function __construct(
        public ?string $asin,
        #[StringEnumValidator(['DoesNotExist', 'InvalidASIN'])]
        public ?string $error_reason,
    ) {
    }
}
