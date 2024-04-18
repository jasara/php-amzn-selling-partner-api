<?php

namespace Jasara\AmznSPA\Data\Schemas\Tokens;

use Jasara\AmznSPA\Data\Base\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RestrictedResourceSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(['GET', 'PUT', 'POST', 'DELETE'])]
        public string $method,
        public string $path,
        #[StringArrayEnumValidator(['buyerInfo', 'shippingAddress'])]
        public ?array $data_elements,
    ) {
    }
}
