<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Schemas;

use Carbon\CarbonImmutable;
use Illuminate\Support\Str;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\InboundShipmentItemSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(InboundShipmentItemSchema::class)]
#[CoversClass(CarbonFromStringCaster::class)]
class InboundShipmentItemSchemaTest extends UnitTestCase
{
    public function testCarbonDate()
    {
        $dto = new InboundShipmentItemSchema(
            seller_sku: Str::random(),
            quantity_shipped: rand(1, 10),
            release_date: '2020-12-01',
        );

        $this->assertInstanceOf(CarbonImmutable::class, $dto->release_date);
        $this->assertEquals('2020-12-01', $dto->release_date->toDateString());
    }
}
