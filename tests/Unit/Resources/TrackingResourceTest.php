<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\Tracking\GetShipmentTrackingResponse;
use Jasara\AmznSPA\Exceptions\InvalidParametersException;
use Jasara\AmznSPA\Resources\TrackingResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(TrackingResource::class)]
final class TrackingResourceTest extends UnitTestCase
{
    public function testGetShipmentTrackingByAftn(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('tracking/get-shipment-tracking');

        $aftn = 'AFTN' . random_int(100000, 999999);

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->tracking->getShipmentTracking(aftn: $aftn);

        $this->assertInstanceOf(GetShipmentTrackingResponse::class, $response);
        $this->assertEquals('AFTN987654321', $response->tracking_detail->identifier->aftn);
        $this->assertEquals('1Z999AA1234567890', $response->tracking_detail->identifier->carrier_tracking->tracking_number);
        $this->assertEquals('UPS', $response->tracking_detail->identifier->carrier_tracking->carrier_code);
        $this->assertEquals('https://www.swiship.com/track/AFTN987654321', $response->tracking_detail->tracking_url);

        $this->assertCount(1, $response->tracking_detail->tracking_estimates);
        $this->assertEquals('ESTIMATED_DELIVERY_DATE', $response->tracking_detail->tracking_estimates[0]->type);
        $this->assertEquals('2026-02-03 08:00:00', $response->tracking_detail->tracking_estimates[0]->estimated_interval->start_time->format('Y-m-d H:i:s'));
        $this->assertEquals('2026-02-03 20:00:00', $response->tracking_detail->tracking_estimates[0]->estimated_interval->end_time->format('Y-m-d H:i:s'));
        $this->assertEquals('2026-02-01 12:15:00', $response->tracking_detail->tracking_estimates[0]->last_updated_time->format('Y-m-d H:i:s'));

        $this->assertEquals('OUT_FOR_DELIVERY', $response->tracking_detail->latest_milestone->status->code);
        $this->assertEquals('DELIVERY_ATTEMPTED', $response->tracking_detail->latest_milestone->status->sub_code);
        $this->assertEquals('The package is out for delivery.', $response->tracking_detail->latest_milestone->status->description);
        $this->assertEquals('Seattle', $response->tracking_detail->latest_milestone->location->address->city);
        $this->assertEquals('Washington', $response->tracking_detail->latest_milestone->location->address->region);
        $this->assertEquals('US', $response->tracking_detail->latest_milestone->location->address->country_code);
        $this->assertEquals('2026-02-03 09:32:00', $response->tracking_detail->latest_milestone->occurred_at->format('Y-m-d H:i:s'));

        $this->assertCount(2, $response->tracking_detail->milestone_history);
        $this->assertEquals('SHIPPED', $response->tracking_detail->milestone_history[1]->status->code);
        $this->assertNull($response->tracking_detail->milestone_history[1]->status->sub_code);
        $this->assertNull($response->tracking_detail->milestone_history[1]->location);

        $http->assertSent(function (Request $request) use ($aftn) {
            $this->assertEquals('GET', $request->method());
            $this->assertStringContainsString('https://sellingpartnerapi-na.amazon.com/tracking/2026-01-30/shipments/track', $request->url());
            $this->assertStringContainsString('aftn=' . $aftn, $request->url());

            return true;
        });
    }

    public function testGetShipmentTrackingByCarrierTracking(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('tracking/get-shipment-tracking');

        $tracking_number = Str::random();
        $carrier_code = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->tracking->getShipmentTracking(
            carrier_tracking_number: $tracking_number,
            carrier_code: $carrier_code,
        );

        $this->assertInstanceOf(GetShipmentTrackingResponse::class, $response);

        $http->assertSent(function (Request $request) use ($tracking_number, $carrier_code) {
            $this->assertEquals('GET', $request->method());
            $this->assertStringContainsString('carrierTracking.trackingNumber=' . $tracking_number, urldecode($request->url()));
            $this->assertStringContainsString('carrierTracking.carrierCode=' . $carrier_code, urldecode($request->url()));

            return true;
        });
    }

    public function testGetShipmentTrackingByContainerNumber(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('tracking/get-shipment-tracking');

        $container_number = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->tracking->getShipmentTracking(container_number: $container_number);

        $this->assertInstanceOf(GetShipmentTrackingResponse::class, $response);

        $http->assertSent(function (Request $request) use ($container_number) {
            $this->assertStringContainsString('containerNumber=' . $container_number, $request->url());

            return true;
        });
    }

    public function testGetShipmentTrackingByIdAcsinAndHouseBillOfLading(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp([
            'tracking/get-shipment-tracking',
            'tracking/get-shipment-tracking',
            'tracking/get-shipment-tracking',
        ]);

        $id = Str::random();
        $acsin = (string) random_int(10000000000, 99999999999);
        $house_bill_of_lading_number = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $amzn->tracking->getShipmentTracking(id: $id);
        $amzn->tracking->getShipmentTracking(acsin: $acsin);
        $amzn->tracking->getShipmentTracking(house_bill_of_lading_number: $house_bill_of_lading_number);

        $http->assertSentInOrder([
            function (Request $request) use ($id) {
                $this->assertStringContainsString('id=' . $id, $request->url());

                return true;
            },
            function (Request $request) use ($acsin) {
                $this->assertStringContainsString('acsin=' . $acsin, $request->url());

                return true;
            },
            function (Request $request) use ($house_bill_of_lading_number) {
                $this->assertStringContainsString('houseBillOfLadingNumber=' . $house_bill_of_lading_number, $request->url());

                return true;
            },
        ]);
    }

    public function testGetShipmentTrackingWithoutIdentifierThrowsException(): void
    {
        [$config] = $this->setupConfigWithFakeHttp('tracking/get-shipment-tracking');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');

        $this->expectException(InvalidParametersException::class);
        $this->expectExceptionMessage('Exactly one tracking identifier must be provided.');

        $amzn->tracking->getShipmentTracking();
    }

    public function testGetShipmentTrackingWithMultipleIdentifiersThrowsException(): void
    {
        [$config] = $this->setupConfigWithFakeHttp('tracking/get-shipment-tracking');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');

        $this->expectException(InvalidParametersException::class);

        $amzn->tracking->getShipmentTracking(
            aftn: 'AFTN123456789',
            container_number: Str::random(),
        );
    }

    public function testGetShipmentTrackingReturnsErrors(): void
    {
        [$config] = $this->setupConfigWithFakeHttp('errors/invalid-request-parameters', 400);

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->tracking->getShipmentTracking(aftn: 'AFTN123456789');

        $this->assertInstanceOf(GetShipmentTrackingResponse::class, $response);
        $this->assertNull($response->tracking_detail);
        $this->assertNotNull($response->errors);
        $this->assertEquals('InvalidInput', $response->errors[0]->code);
    }
}
