<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Sellers;

use Spatie\DataTransferObject\DataTransferObject;

class MarketplaceSchema extends DataTransferObject
{
    public string $id;

    public string $name;

    public string $country_code;

    public string $default_currency_code;

    public string $default_language_code;

    public string $domain_name;
}
