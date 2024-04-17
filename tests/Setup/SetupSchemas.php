<?php

namespace Jasara\AmznSPA\Tests\Setup;

use Illuminate\Support\Str;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\CreateInboundShipmentPlanRequest;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\ContactSchema;
use Jasara\AmznSPA\Data\Schemas\ShippingAddressSchema;

trait SetupSchemas
{
    public function setupAddress(): AddressSchema
    {
        return AddressSchema::from(
            name: Str::random(),
            address_line_1: Str::random(),
            address_line_2: Str::random(),
            city: Str::random(),
            state_or_province_code: 'NY',
            country_code: 'US',
            postal_code: '21222',
        );
    }

    public function setupContact(): ContactSchema
    {
        return ContactSchema::from(
            name: Str::random(),
            phone: Str::random(),
            email: Str::random(),
        );
    }

    public function setupShippingAddress(): ShippingAddressSchema
    {
        return ShippingAddressSchema::from(
            name: Str::random(),
            address_line_1: Str::random(),
            address_line_2: Str::random(),
            city: Str::random(),
            state_or_region: 'NY',
            country_code: 'US',
            postal_code: '21222',
        );
    }

    public function setupInboundShipmentPlanRequest(): CreateInboundShipmentPlanRequest
    {
        return CreateInboundShipmentPlanRequest::from(
            ...array_keys_to_snake($this->loadHttpStub('fulfillment-inbound/create-inbound-shipment-plan-request')),
        );
    }
}
