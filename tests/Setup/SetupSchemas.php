<?php

namespace Jasara\AmznSPA\Tests\Setup;

use Illuminate\Support\Str;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound\CreateInboundShipmentPlanRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\InboundShipmentPlanRequestItemSchema;

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

    public function setupInboundShipmentPlanRequest(): CreateInboundShipmentPlanRequest
    {
        return new CreateInboundShipmentPlanRequest(
            ship_from_address: $this->setupAddress(),
            label_prep_preference: 'SELLER_LABEL',
            inbound_shipment_plan_request_items: [
                new InboundShipmentPlanRequestItemSchema(
                    seller_sku: Str::random(),
                    asin: Str::random(),
                    condition: 'NewItem',
                    quantity: rand(1, 100),
                    prep_details_list: [
                        [
                            'prep_instruction' => 'Polybagging',
                            'prep_owner' => 'SELLER',
                        ],
                    ]
                ),
            ]
        );
    }
}
