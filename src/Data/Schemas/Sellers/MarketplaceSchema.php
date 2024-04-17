<?php

namespace Jasara\AmznSPA\Data\Schemas\Sellers;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class MarketplaceSchema extends BaseSchema
{
    public function __construct(
        public string $id,
        public string $name,
        public string $country_code,
        public string $default_currency_code,
        public string $default_language_code,
        public string $domain_name,
    ) {
    }
}
