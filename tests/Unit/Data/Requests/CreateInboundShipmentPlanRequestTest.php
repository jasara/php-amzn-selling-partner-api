<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Requests;

use Illuminate\Support\Str;
use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\CreateInboundShipmentPlanRequest;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CreateInboundShipmentPlanRequest::class)]
#[CoversClass(MaxLengthValidator::class)]
class CreateInboundShipmentPlanRequestTest extends UnitTestCase
{
    public function testFormatsDataInPascalCase()
    {
        $request = CreateInboundShipmentPlanRequest::from(
            ship_from_address: [
                'name' => Str::random(10),
                'address_line_1' => Str::random(),
                'address_line_2' => null,
                'district_or_county' => Str::random(),
                'city' => Str::random(),
                'state_or_province_code' => Str::random(),
                'country_code' => Str::random(2),
                'postal_code' => Str::random(),
            ],
            label_prep_preference: 'SELLER_LABEL',
            inbound_shipment_plan_request_items: [
                [
                    'seller_sku' => Str::random(),
                    'asin' => Str::random(),
                    'condition' => 'NewItem',
                    'quantity' => 1,
                ],
            ],
        );

        $array_object = $request->toArrayObject();

        $this->assertArrayHasKey('ShipFromAddress', $array_object);
        $this->assertArrayHasKey('LabelPrepPreference', $array_object);
        $this->assertArrayHasKey('InboundShipmentPlanRequestItems', $array_object);
    }
}
