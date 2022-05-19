<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Requests\Shipping\CreateShipmentRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\Shipping\GetRatesRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\Shipping\PurchaseLabelsRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\Shipping\PurchaseShipmentRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\Shipping\RetrieveShippingLabelRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Shipping\CreateShipmentResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Shipping\GetAccountResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Shipping\GetRatesResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Shipping\GetShipmentResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Shipping\GetTrackingInformationResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Shipping\PurchaseLabelsResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Shipping\PurchaseShipmentResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Shipping\RetrieveShippingLabelResponse;
use Jasara\AmznSPA\Tests\Setup\SetupContainers;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Resources\ShippingResource
 */
class ShippingResourceTest extends UnitTestCase
{
    use SetupContainers;

    public function testCreateShipment()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('shipping/create-shipment');

        $request = new CreateShipmentRequest(
            client_reference_id: Str::random(),
            ship_to: $this->setupShippingAddress(),
            ship_from: $this->setupShippingAddress(),
            containers: $this->setupContainers(),
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->shipping->createShipment($request);

        $this->assertInstanceOf(CreateShipmentResponse::class, $response);
        $this->assertEquals('TEST_CASE_200', $response->payload->shipment_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/shipping/v1/shipments', urldecode($request->url()));

            return true;
        });
    }

    public function testGetShipment()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('shipping/get-shipment');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->shipping->getShipment($shipment_id);

        $this->assertInstanceOf(GetShipmentResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/shipping/v1/shipments/' . $shipment_id, $request->url());

            return true;
        });
    }

    public function testCancelShipment()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('empty');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->shipping->cancelShipment($shipment_id);

        $this->assertInstanceOf(BaseResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/shipping/v1/shipments/' . $shipment_id . '/cancel', $request->url());

            return true;
        });
    }

    public function testPurchaseLabels()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('shipping/purchase-labels');
        $request = new PurchaseLabelsRequest(
            rate_id: Str::random(),
            label_specification: [
                'label_format' => 'PNG',
                'label_stock_size' => '4x6',
            ]
        );

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->shipping->purchaseLabels($shipment_id, $request);

        $this->assertInstanceOf(PurchaseLabelsResponse::class, $response);
        $this->assertEquals('911-7267646-6348616', $response->payload->client_reference_id);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/shipping/v1/shipments/' . $shipment_id . '/purchaseLabels', $request->url());

            return true;
        });
    }

    public function testRetrieveShippingLabel()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('shipping/retrieve-shipping-label');
        $request = new RetrieveShippingLabelRequest(
            label_specification: [
                'label_format' => 'PNG',
                'label_stock_size' => '4x6',
            ]
        );

        $shipment_id = Str::random();
        $tracking_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->shipping->retrieveShippingLabel($shipment_id, $tracking_id, $request);

        $this->assertInstanceOf(RetrieveShippingLabelResponse::class, $response);
        $this->assertEquals('PNG', $response->payload->label_specification->label_format);

        $http->assertSent(function (Request $request) use ($shipment_id, $tracking_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/shipping/v1/shipments/' . $shipment_id . '/containers' . '/' . $tracking_id . '/label', $request->url());

            return true;
        });
    }

    public function testPurchaseShipment()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('shipping/purchase-shipment');
        $request = new PurchaseShipmentRequest(
            client_reference_id: Str::random(),
            ship_to: $this->setupShippingAddress(),
            ship_from: $this->setupShippingAddress(),
            service_type: 'Amazon Shipping Ground',
            containers: $this->setupContainers(),
            label_specification: [
                'label_format' => 'PNG',
                'label_stock_size' => '4x6',
            ]
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->shipping->purchaseShipment($request);

        $this->assertInstanceOf(PurchaseShipmentResponse::class, $response);
        $this->assertEquals('TEST_CASE_200', $response->payload->shipment_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/shipping/v1/purchaseShipment', $request->url());

            return true;
        });
    }

    public function testGetRates()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('shipping/get-rates');
        $request = new GetRatesRequest(
            ship_to: $this->setupShippingAddress(),
            ship_from: $this->setupShippingAddress(),
            service_types: [
                ['service_type' => 'Amazon Shipping Ground'],
            ],
            container_specifications: [
                [
                    'dimensions' => [
                        'height' => 10,
                        'length' => 10,
                        'width' => 15,
                        'unit' => 'CM',
                    ],
                    'weight' => [
                        'unit' => 'lb',
                        'value' => 10,
                    ],
                ],
            ]
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->shipping->getRates($request);

        $this->assertInstanceOf(GetRatesResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/shipping/v1/rates', $request->url());

            return true;
        });
    }

    public function testGetAccount()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('shipping/get-account');

        $amzn = new AmznSPA($config);

        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->shipping->getAccount();

        $this->assertInstanceOf(GetAccountResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/shipping/v1/account', $request->url());

            return true;
        });
    }

    public function testGetTrackingInformation()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('shipping/get-tracking-information');

        $tracking_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->shipping->getTrackingInformation($tracking_id);

        $this->assertInstanceOf(GetTrackingInformationResponse::class, $response);

        $http->assertSent(function (Request $request) use ($tracking_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/shipping/v1/tracking/' . $tracking_id, $request->url());

            return true;
        });
    }
}
