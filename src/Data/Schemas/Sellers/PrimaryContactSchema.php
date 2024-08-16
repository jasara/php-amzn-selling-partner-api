<?php

namespace Jasara\AmznSPA\Data\Schemas\Sellers;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PrimaryContactSchema extends BaseSchema
{
    public function __construct(
        public string $name,
        public SellersAddressSchema $address,
        public ?string $non_latin_name,
    ) {
    }
}
