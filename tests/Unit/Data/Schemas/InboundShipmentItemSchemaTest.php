<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Schemas;

use Carbon\CarbonImmutable;
use Illuminate\Support\Str;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\InboundShipmentItemSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(InboundShipmentItemSchema::class)]
#[CoversClass(CarbonFromStringCaster::class)]
class InboundShipmentItemSchemaTest extends UnitTestCase
{
    public function testCarbonDate()
    {
        $schema = InboundShipmentItemSchema::from(
            seller_sku: Str::random(),
            quantity_shipped: rand(1, 10),
            release_date: '2020-12-01',
        );

        $this->assertInstanceOf(CarbonImmutable::class, $schema->release_date);
        $this->assertEquals('2020-12-01', $schema->release_date->toDateString());
    }
}
