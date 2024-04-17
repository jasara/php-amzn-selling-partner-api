<?php

namespace Jasara\AmznSPA\Tests\Unit\Data\Base;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\BuildsData;
use Jasara\AmznSPA\Data\Base\Data;
use Jasara\AmznSPA\Data\Responses\Tokens\CreateRestrictedDataTokenResponse;
use Jasara\AmznSPA\Data\Responses\Uploads\CreateUploadDestinationResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\NonPartneredSmallParcelDataOutputSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\NonPartneredSmallParcelPackageOutputListSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\NonPartneredSmallParcelPackageOutputSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\PartneredLtlDataInputSchema;
use Jasara\AmznSPA\Data\Schemas\Uploads\UploadDestinationSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Data::class)]
#[CoversClass(BuildsData::class)]
class BuildsDataTest extends UnitTestCase
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
        $this->assertGreaterThanOrEqual(3598, $data->expires_in->diffInSeconds());
        $this->assertLessThanOrEqual(3600, $data->expires_in->diffInSeconds());
    }

    public function testBuildsDataWithCasters(): void
    {
        $data = PartneredLtlDataInputSchema::from([
            'freight_ready_date' => '2021-01-01',
        ]);

        $this->assertInstanceOf(PartneredLtlDataInputSchema::class, $data);
        $this->assertInstanceOf(CarbonImmutable::class, $data->freight_ready_date);
        $this->assertEquals('2021-01-01', $data->freight_ready_date->toDateString());
    }
}
