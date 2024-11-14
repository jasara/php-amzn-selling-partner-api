<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base;

use Illuminate\Support\Collection;
use Jasara\AmznSPA\Data\Base\Data;
use Jasara\AmznSPA\Data\Base\ToArrayObject;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\PutTransportDetailsRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\PartneredLtlDataInputSchema;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\AdditionalSellerInputSchema;
use Jasara\AmznSPA\Data\Schemas\Notifications\ProcessingDirectiveSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ToArrayObject::class)]
class ToArrayObjectTest extends UnitTestCase
{
    public function testReturnsDataUsingMappers(): void
    {
        $data = PartneredLtlDataInputSchema::from([
            'freight_ready_date' => '2021-01-01',
        ]);

        $array_object = $data->toArrayObject();

        $this->assertEquals('2021-01-01', $array_object['freightReadyDate']);
    }

    public function testReturnsDataUsingCollection(): void
    {
        $test = new Collection(['abc']);
        $data = new CollectionTest($test);

        $array_object = $data->toArrayObject();

        $this->assertEquals('abc', $array_object['test'][0]);
    }

    public function testReturnsDataUsingCarbonImmutable(): void
    {
        $data = AdditionalSellerInputSchema::from([
            'value_as_timestamp' => '2021-01-01',
        ]);

        $array_object = $data->toArrayObject();

        $this->assertEquals('2021-01-01T00:00:00Z', $array_object['valueAsTimestamp']);
    }

    public function testReturnsDataUsingSnakeCase(): void
    {
        $data = ProcessingDirectiveSchema::from([
            'event_filter' => [
                'event_filter_type' => 'ANY_OFFER_CHANGED',
            ],
        ]);

        $array_object = $data->toArrayObject();

        $this->assertEquals('ANY_OFFER_CHANGED', $array_object['event_filter']['event_filter_type']);
    }

    public function testReturnsDataUsingPascalCase(): void
    {
        $request = PutTransportDetailsRequest::from(
            is_partnered: true,
            shipment_type: 'LTL',
            transport_details: [],
        );

        $array_object = $request->toArrayObject();

        $this->assertEquals('LTL', $array_object['ShipmentType']);
    }
}

class CollectionTest extends Data
{
    public function __construct(
        public Collection $test,
    ) {
    }
}
