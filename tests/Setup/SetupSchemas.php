<?php

namespace Jasara\AmznSPA\Tests\Setup;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;

trait SetupSchemas
{
    public function setupAddress(): AddressSchema
    {
        return new AddressSchema(
            name: Str::random(),
            address_line_1: Str::random(),
            address_line_2: Str::random(),
            city: Str::random(),
            state_or_province_code: 'NY',
            country_code: 'US',
            postal_code: '21222',
        );
    }
}
