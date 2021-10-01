<?php

namespace Jasara\AmznSPA\Tests\Setup;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound\CreateInboundShipmentPlanRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ContactSchema;

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

    public function setupContact(): ContactSchema
    {
        return new ContactSchema(
            name: Str::random(),
            phone: Str::random(),
            email: Str::random(),
        );
    }

    public function setupInboundShipmentPlanRequest(): CreateInboundShipmentPlanRequest
    {
        return new CreateInboundShipmentPlanRequest(
            ...array_keys_to_snake($this->loadHttpStub('fulfillment-inbound/create-inbound-shipment-plan-request')),
        );
    }
}
