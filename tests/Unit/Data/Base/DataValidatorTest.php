<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base;

use Illuminate\Support\Str;
use Jasara\AmznSPA\Data\Base\DataValidator;
use Jasara\AmznSPA\Data\Base\Validators\DataValidationException;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\CreateInboundShipmentPlanRequest;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\InboundShipmentPlanRequestItemListSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\InboundShipmentPlanRequestItemSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(DataValidator::class)]
class DataValidatorTest extends UnitTestCase
{
    public function testValidatesData(): void
    {
        $this->expectException(DataValidationException::class);
        $this->expectExceptionMessage('The length of the string');

        AddressSchema::from([
            'name' => Str::random(60),
            'address_line_1' => Str::random(),
            'country_code' => Str::random(2),
            'postal_code' => Str::random(),
        ]);
    }

    public function testValidatesDataRecursively(): void
    {
        $this->expectException(DataValidationException::class);
        $this->expectExceptionMessage('The length of the string');

        CreateInboundShipmentPlanRequest::from([
            'ship_from_address' => new AddressSchema(
                name: Str::random(60),
                address_line_1: Str::random(),
                address_line_2: null,
                district_or_county: null,
                city: null,
                state_or_province_code: null,
                country_code: Str::random(2),
                postal_code: Str::random(),
                email: null,
                phone: null,
            ),
            'label_prep_preference' => 'SELLER_LABEL',
            'inbound_shipment_plan_request_items' => [
                [
                    'seller_sku' => Str::random(),
                    'asin' => Str::random(),
                    'condition' => 'INVALID',
                    'quantity' => 1,
                ],
            ],
        ]);
    }

    public function testValidatesCollectionsOfData(): void
    {
        $this->expectException(DataValidationException::class);
        $this->expectExceptionMessage('Validation failed for property condition');

        CreateInboundShipmentPlanRequest::from([
            'ship_from_address' => [
                'name' => Str::random(10),
                'address_line_1' => Str::random(),
                'country_code' => Str::random(2),
                'postal_code' => Str::random(),
            ],
            'label_prep_preference' => 'SELLER_LABEL',
            'inbound_shipment_plan_request_items' => InboundShipmentPlanRequestItemListSchema::make([
                new InboundShipmentPlanRequestItemSchema(
                    seller_sku: Str::random(),
                    asin: Str::random(),
                    condition: 'INVALID',
                    quantity: 1,
                    quantity_in_case: null,
                    prep_details_list: null,
                ),
            ]),
        ]);
    }
}
