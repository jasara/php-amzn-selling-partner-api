<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base;

use Jasara\AmznSPA\Data\Base\ToArrayObject;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\PutTransportDetailsRequest;
use Jasara\AmznSPA\Data\Requests\ListingsItems\ListingsItemPatchRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\PartneredLtlDataInputSchema;
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
        $data = ListingsItemPatchRequest::from([
            'product_type' => 'test',
            'patches' => [
                [
                    'op' => 'add',
                    'path' => '/path',
                ],
            ],
        ]);

        $array_object = $data->toArrayObject();

        $this->assertEquals('test', $array_object['productType']);
        $this->assertCount(1, $array_object['patches']);
        $this->assertEquals('add', $array_object['patches'][0]['op']);
        $this->assertEquals('/path', $array_object['patches'][0]['path']);
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
