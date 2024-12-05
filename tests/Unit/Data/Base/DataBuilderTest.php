<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base;

use Carbon\CarbonImmutable;
use Illuminate\Support\Str;
use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Base\Data;
use Jasara\AmznSPA\Data\Base\DataBuilder;
use Jasara\AmznSPA\Data\Responses\CatalogItems\v20201201\GetCatalogItemResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\CreateFulfillmentOrderResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\GetDestinationsResponse;
use Jasara\AmznSPA\Data\Responses\Tokens\CreateRestrictedDataTokenResponse;
use Jasara\AmznSPA\Data\Responses\Uploads\CreateUploadDestinationResponse;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\InboundShipmentInfoSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\NonPartneredSmallParcelDataOutputSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\NonPartneredSmallParcelPackageOutputListSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\NonPartneredSmallParcelPackageOutputSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\PartneredLtlDataInputSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\MskuPrepDetailInputSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\PrepCategory;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\PrepType;
use Jasara\AmznSPA\Data\Schemas\Notifications\DestinationListSchema;
use Jasara\AmznSPA\Data\Schemas\ProductFees\FeesEstimateErrorSchema;
use Jasara\AmznSPA\Data\Schemas\Uploads\UploadDestinationSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Data::class)]
#[CoversClass(DataBuilder::class)]
class DataBuilderTest extends UnitTestCase
{
    public function testBuildDataWithNamedParameters(): void
    {
        $data = NonPartneredSmallParcelPackageOutputSchema::from(
            carrier_name: 'carrier_name',
            package_status: 'SHIPPED',
        );

        $this->assertInstanceOf(NonPartneredSmallParcelPackageOutputSchema::class, $data);
        $this->assertEquals('carrier_name', $data->carrier_name);
        $this->assertNull($data->tracking_id);
        $this->assertEquals('SHIPPED', $data->package_status);
    }

    public function testBuildDataWithStringsAndNulls(): void
    {
        $data = NonPartneredSmallParcelPackageOutputSchema::from([
            'carrier_name' => 'carrier_name',
            'tracking_id' => null,
            'package_status' => 'SHIPPED',
        ]);

        $this->assertInstanceOf(NonPartneredSmallParcelPackageOutputSchema::class, $data);
        $this->assertEquals('carrier_name', $data->carrier_name);
        $this->assertNull($data->tracking_id);
        $this->assertEquals('SHIPPED', $data->package_status);
    }

    public function testBuildDataWithCollectionLikeSchema(): void
    {
        $data = NonPartneredSmallParcelDataOutputSchema::from([
            'package_list' => [
                new NonPartneredSmallParcelPackageOutputSchema(
                    carrier_name: 'carrier_name',
                    tracking_id: 'tracking_id',
                    package_status: 'SHIPPED',
                ),
                [
                    'carrier_name' => 'carrier_name2',
                    'package_status' => 'IN_TRANSIT',
                ],
            ],
        ]);

        $this->assertInstanceOf(NonPartneredSmallParcelDataOutputSchema::class, $data);
        $this->assertInstanceOf(NonPartneredSmallParcelPackageOutputListSchema::class, $data->package_list);
        $this->assertCount(2, $data->package_list);
        $this->assertInstanceOf(NonPartneredSmallParcelPackageOutputSchema::class, $data->package_list[0]);
        $this->assertEquals('carrier_name', $data->package_list[0]->carrier_name);
        $this->assertEquals('tracking_id', $data->package_list[0]->tracking_id);
        $this->assertEquals('SHIPPED', $data->package_list[0]->package_status);

        $this->assertInstanceOf(NonPartneredSmallParcelPackageOutputSchema::class, $data->package_list[1]);
        $this->assertEquals('carrier_name2', $data->package_list[1]->carrier_name);
        $this->assertNull($data->package_list[1]->tracking_id);
        $this->assertEquals('IN_TRANSIT', $data->package_list[1]->package_status);
    }

    public function testBuildDataFailsIfInvalidDataSentToCollectionParameter(): void
    {
        $this->expectExceptionMessage('Expected iterable for collection parameter');

        NonPartneredSmallParcelDataOutputSchema::from([
            'package_list' => 'INVALID',
        ]);
    }

    public function testBuildDataWithNestedData(): void
    {
        $data = CreateUploadDestinationResponse::from([
            'payload' => [
                'upload_destination_id' => 'upload_destination_id',
                'url' => 'url',
                'headers' => [
                    'key' => 'value',
                ],
            ],
        ]);

        $this->assertInstanceOf(CreateUploadDestinationResponse::class, $data);
        $this->assertInstanceOf(UploadDestinationSchema::class, $data->payload);
        $this->assertEquals('upload_destination_id', $data->payload->upload_destination_id);
        $this->assertEquals('url', $data->payload->url);
        $this->assertEquals(['key' => 'value'], $data->payload->headers);
    }

    public function testBuildsDataWithUnionType(): void
    {
        $data = CreateRestrictedDataTokenResponse::from([
            'restricted_data_token' => 'restricted_data_token',
            'expires_in' => 3600,
        ]);

        $this->assertInstanceOf(CreateRestrictedDataTokenResponse::class, $data);
        $this->assertEquals('restricted_data_token', $data->restricted_data_token);
        $this->assertInstanceOf(CarbonImmutable::class, $data->expires_in);
        $this->assertEqualsWithDelta(3600, $data->expires_in->diffInSeconds(absolute: true), 2);
    }

    public function testBuildsDataWithInvalidData(): void
    {
        $this->expectExceptionMessage('Missing required parameter: name');

        AddressSchema::from([
            'address_line_1' => 'address_line_1',
            'country_code' => 'CA',
            'postal_code' => 'postal_code',
        ]);
    }

    public function testBuildsDataWithCarbonCaster(): void
    {
        $data = PartneredLtlDataInputSchema::from([
            'freight_ready_date' => '2021-01-01',
        ]);

        $this->assertInstanceOf(PartneredLtlDataInputSchema::class, $data);
        $this->assertInstanceOf(CarbonImmutable::class, $data->freight_ready_date);
        $this->assertEquals('2021-01-01', $data->freight_ready_date->toDateString());
    }

    public function testBuildsDataWithEmptyArrayAsNull(): void
    {
        $data = InboundShipmentInfoSchema::from([
            'ship_from_address' => [],
        ]);

        $this->assertInstanceOf(InboundShipmentInfoSchema::class, $data);
        $this->assertNull($data->ship_from_address);
    }

    public function testBuildsDataWithEmptyArrayNotNullableDoesNotMapToNull(): void
    {
        $data = FeesEstimateErrorSchema::from([
            'type' => 'type',
            'code' => 'code',
            'message' => 'message',
            'detail' => [],
        ]);

        $this->assertInstanceOf(FeesEstimateErrorSchema::class, $data);

        $data = GetDestinationsResponse::from([
            'payload' => [],
        ]);

        $this->assertInstanceOf(GetDestinationsResponse::class, $data);
        $this->assertInstanceOf(DestinationListSchema::class, $data->payload);
    }

    public function testBuildDataWithNoParameters(): void
    {
        $data = CreateFulfillmentOrderResponse::from();

        $this->assertInstanceOf(CreateFulfillmentOrderResponse::class, $data);
    }

    public function testBuildDataWithFlatResponse(): void
    {
        $data = GetCatalogItemResponse::from([
            'asin' => 'asin',
        ]);

        $this->assertInstanceOf(GetCatalogItemResponse::class, $data);
        $this->assertEquals('asin', $data->item->asin);
    }

    public function testBuildDataWithEmptyFlatResponseIsIsError(): void
    {
        $data = GetCatalogItemResponse::from([
            'errors' => [],
        ]);

        $this->assertInstanceOf(GetCatalogItemResponse::class, $data);
        $this->assertNull($data->item);
    }

    public function testBuildDataWithFlatResponseFailsIfParameterDoesntExist(): void
    {
        $this->expectExceptionMessage('Missing required parameter: invalid');

        $class = new class('test') extends Data implements IsFlatResponse {
            public function __construct(
                public string $not_matching,
            ) {
            }

            public static function mapResponseToParameter(): string
            {
                return 'invalid';
            }
        };

        $class::from([
            'invalid' => 'invalid',
        ]);
    }

    public function testBuildDataWithEnum(): void
    {
        $data = MskuPrepDetailInputSchema::from(
            msku: Str::random(),
            prep_category: 'TEXTILE',
            prep_types: [
                PrepType::ItemBoxing,
            ],
        );

        $this->assertInstanceOf(MskuPrepDetailInputSchema::class, $data);
        $this->assertEquals(PrepCategory::Textile, $data->prep_category);
        $this->assertEquals(PrepType::ItemBoxing, $data->prep_types[0]);
    }
}
