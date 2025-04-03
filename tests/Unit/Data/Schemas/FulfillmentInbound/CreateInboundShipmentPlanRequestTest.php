<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class CreateInboundShipmentPlanRequestTest extends UnitTestCase
{
    public function testToArrayObject()
    {
        $request = $this->setupInboundShipmentPlanRequest();

        $array_object = $request->toArrayObject();

        $this->assertArrayHasKey('ShipFromAddress', $array_object);
        $this->assertArrayHasKey('LabelPrepPreference', $array_object);
        $this->assertArrayHasKey('InboundShipmentPlanRequestItems', $array_object);
        $this->assertArrayHasKey('ShipToCountryCode', $array_object);

        $this->assertArrayHasKey('Name', $array_object['ShipFromAddress']);
        $this->assertArrayHasKey('AddressLine1', $array_object['ShipFromAddress']);

        $this->assertArrayHasKey('SellerSKU', $array_object['InboundShipmentPlanRequestItems'][0]);
        $this->assertArrayHasKey('ASIN', $array_object['InboundShipmentPlanRequestItems'][0]);
        $this->assertArrayHasKey('Condition', $array_object['InboundShipmentPlanRequestItems'][0]);
    }
}
