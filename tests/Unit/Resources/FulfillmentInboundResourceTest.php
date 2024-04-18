<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Carbon\CarbonImmutable;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\InboundShipmentRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\PutTransportDetailsRequest;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\ConfirmPreorderResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\ConfirmTransportResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\CreateInboundShipmentPlanResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\EstimateTransportResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\GetBillOfLadingResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\GetInboundGuidanceResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\GetLabelsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\GetPreorderInfoResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\GetPrepInstructionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\GetShipmentItemsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\GetShipmentsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\GetTransportDetailsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\InboundShipmentResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\PutTransportDetailsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\VoidTransportResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(\Jasara\AmznSPA\Resources\FulfillmentInboundResource::class)]
class FulfillmentInboundResourceTest extends UnitTestCase
{
    public function testGetInboundGuidance()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/get-inbound-guidance');

        $sku = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getInboundGuidance('ATVPDKIKX0DER', [$sku]);

        $this->assertInstanceOf(GetInboundGuidanceResponse::class, $response);

        $http->assertSent(function (Request $request) use ($sku) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/itemsGuidance?MarketplaceId=ATVPDKIKX0DER&SellerSKUList=' . $sku, urldecode($request->url()));

            return true;
        });
    }

    public function testCreateInboundShipmentPlan()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/create-inbound-shipment-plan');
        $request = $this->setupInboundShipmentPlanRequest();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->createInboundShipmentPlan($request);

        $this->assertInstanceOf(CreateInboundShipmentPlanResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/plans', urldecode($request->url()));

            return true;
        });
    }

    public function testUpdateInboundShipment()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/update-inbound-shipment');

        $shipment_id = Str::random();

        $request = InboundShipmentRequest::from(
            marketplace_id: 'ATVPDKIKX0DER',
            inbound_shipment_header: [
                'shipment_name' => Str::random(),
                'ship_from_address' => $this->setupAddress(),
                'destination_fulfillment_center_id' => Str::random(),
                'shipment_status' => 'WORKING',
                'label_prep_preference' => 'SELLER_LABEL',
            ],
            inbound_shipment_items: [
                [
                    'shipment_id' => $shipment_id,
                    'seller_sku' => Str::random(),
                    'quantity_shipped' => rand(1, 10),
                ],
            ],
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->updateInboundShipment($shipment_id, $request);

        $this->assertInstanceOf(InboundShipmentResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id, urldecode($request->url()));

            return true;
        });
    }

    public function testCreateInboundShipment()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/create-inbound-shipment');

        $shipment_id = Str::random();

        $request = InboundShipmentRequest::from(
            marketplace_id: 'ATVPDKIKX0DER',
            inbound_shipment_header: [
                'shipment_name' => Str::random(),
                'ship_from_address' => $this->setupAddress(),
                'destination_fulfillment_center_id' => Str::random(),
                'shipment_status' => 'WORKING',
                'label_prep_preference' => 'SELLER_LABEL',
            ],
            inbound_shipment_items: [
                [
                    'shipment_id' => $shipment_id,
                    'seller_sku' => Str::random(),
                    'quantity_shipped' => rand(1, 10),
                ],
            ],
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->createInboundShipment($shipment_id, $request);

        $this->assertInstanceOf(InboundShipmentResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id, urldecode($request->url()));

            return true;
        });
    }

    public function testGetPreorderInfo()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/get-preorder-info');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getPreorderInfo($shipment_id, 'ATVPDKIKX0DER');

        $this->assertInstanceOf(GetPreorderInfoResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id . '/preorder?MarketplaceId=ATVPDKIKX0DER', urldecode($request->url()));

            return true;
        });
    }

    public function testConfirmPreorder()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/confirm-preorder');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->confirmPreorder($shipment_id, 'ATVPDKIKX0DER', CarbonImmutable::now());

        $this->assertInstanceOf(ConfirmPreorderResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id . '/preorder/confirm', urldecode($request->url()));
            $this->assertEquals(CarbonImmutable::now()->toDateString(), $request->data()['NeedByDate']);

            return true;
        });
    }

    public function testGetPrepInstructions()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/get-prep-instructions');

        $sku = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getPrepInstructions('US', [$sku]);

        $this->assertInstanceOf(GetPrepInstructionsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($sku) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/prepInstructions?ShipToCountryCode=US&SellerSKUList=' . $sku, urldecode($request->url()));

            return true;
        });
    }

    public function testGetPrepInstructionsWithComma()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/get-prep-instructions');

        $sku = 'Body Fat Measuring Tape, Pack of 2';

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getPrepInstructions('US', [$sku]);

        $this->assertInstanceOf(GetPrepInstructionsResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/prepInstructions?ShipToCountryCode=US&SellerSKUList=Body%20Fat%20Measuring%20Tape%2C%20Pack%20of%202', $request->url());

            return true;
        });
    }

    public function testGetTransportDetails()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/get-transport-details');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getTransportDetails($shipment_id);

        $this->assertInstanceOf(GetTransportDetailsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id . '/transport', urldecode($request->url()));

            return true;
        });
    }

    #[DataProvider('transportDetailsDataProvider')]
    public function testGetTransportDetailsIssue(string $stub)
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/issues/' . $stub);

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getTransportDetails($shipment_id);

        $this->assertInstanceOf(GetTransportDetailsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id . '/transport', urldecode($request->url()));

            return true;
        });
    }

    public function testGetTransportDetailsIssueContactPropertyIsNull()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/issues/issue-56-contact-null');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getTransportDetails($shipment_id);

        $this->assertInstanceOf(GetTransportDetailsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id . '/transport', urldecode($request->url()));

            return true;
        });
    }

    public function testPutTransportDetails()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/put-transport-details');

        $shipment_id = Str::random();

        $request = PutTransportDetailsRequest::from(
            ...array_keys_to_snake($this->loadHttpStub('fulfillment-inbound/put-transport-details-request')),
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->putTransportDetails($shipment_id, $request);

        $this->assertInstanceOf(PutTransportDetailsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id . '/transport', urldecode($request->url()));

            return true;
        });
    }

    public function testVoidTransport()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/void-transport');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->voidTransport($shipment_id);

        $this->assertInstanceOf(VoidTransportResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id . '/transport/void', urldecode($request->url()));

            return true;
        });
    }

    public function testEstimateTransport()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/estimate-transport');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->estimateTransport($shipment_id);

        $this->assertInstanceOf(EstimateTransportResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id . '/transport/estimate', urldecode($request->url()));

            return true;
        });
    }

    public function testConfirmTransport()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/confirm-transport');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->confirmTransport($shipment_id);

        $this->assertInstanceOf(ConfirmTransportResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id . '/transport/confirm', urldecode($request->url()));

            return true;
        });
    }

    public function testGetLabels()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/get-labels');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getLabels($shipment_id, 'PackageLabel_Letter_2', 'BARCODE_2D');

        $this->assertInstanceOf(GetLabelsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id . '/labels?PageType=PackageLabel_Letter_2&LabelType=BARCODE_2D', urldecode($request->url()));

            return true;
        });
    }

    public function testGetBillOfLading()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/get-labels');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getBillOfLading($shipment_id);

        $this->assertInstanceOf(GetBillOfLadingResponse::class, $response);
        $this->assertNotNull($response->payload->download_url);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id . '/billOfLading', urldecode($request->url()));

            return true;
        });
    }

    public function testGetShipments()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/get-shipments');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getShipments(
            marketplace_id: 'ATVPDKIKX0DER',
            query_type: 'SHIPMENT',
            shipment_status_list: ['WORKING', 'CLOSED'],
        );

        $this->assertInstanceOf(GetShipmentsResponse::class, $response);
        $this->assertEquals('501 Fairview Ave N', $response->payload->shipment_data[0]->ship_from_address->address_line_1);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments?MarketplaceId=ATVPDKIKX0DER&QueryType=SHIPMENT&ShipmentStatusList=WORKING,CLOSED', urldecode($request->url()));

            return true;
        });
    }

    public function testGetShipmentItemsByShipmentId()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/get-shipment-items-by-shipment-id');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getShipmentItemsByShipmentId(
            marketplace_id: 'ATVPDKIKX0DER',
            shipment_id: $shipment_id,
        );

        $this->assertInstanceOf(GetShipmentItemsResponse::class, $response);
        $this->assertEquals('CR-47K6-H6QN', $response->payload->item_data[0]->seller_sku);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id . '/items?MarketplaceId=ATVPDKIKX0DER', urldecode($request->url()));

            return true;
        });
    }

    #[DataProvider('shipmentItemsDataProvider')]
    public function testGetShipmentItemsByShipmentIdIssues($stub)
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/issues/' . $stub);

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getShipmentItemsByShipmentId(
            marketplace_id: 'ATVPDKIKX0DER',
            shipment_id: $shipment_id,
        );

        $this->assertInstanceOf(GetShipmentItemsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments/' . $shipment_id . '/items?MarketplaceId=ATVPDKIKX0DER', urldecode($request->url()));

            return true;
        });
    }

    public function testGetShipmentItems()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/get-shipment-items');
        $last_updated_after = CarbonImmutable::now();
        $last_updated_before = CarbonImmutable::now();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getShipmentItems(
            marketplace_id: 'ATVPDKIKX0DER',
            query_type: 'DATE_RANGE',
            last_updated_after: $last_updated_after,
            last_updated_before: $last_updated_before,
        );

        $this->assertInstanceOf(GetShipmentItemsResponse::class, $response);
        $this->assertEquals('X0014BIZ8T', $response->payload->item_data[0]->fulfillment_network_sku);

        $http->assertSent(function (Request $request) use ($last_updated_after, $last_updated_before) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipmentItems?MarketplaceId=ATVPDKIKX0DER&QueryType=DATE_RANGE&LastUpdatedAfter=' . $last_updated_after->tz('UTC')->format('Y-m-d\TH:i:s\Z') . '&LastUpdatedBefore=' . $last_updated_before->tz('UTC')->format('Y-m-d\TH:i:s\Z'), urldecode($request->url()));

            return true;
        });
    }

    public function testGetShipmentsIssues()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/issues/issue-48-city-null');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getShipments(
            marketplace_id: 'ATVPDKIKX0DER',
            query_type: 'SHIPMENT',
            shipment_status_list: ['WORKING', 'CLOSED'],
        );

        $this->assertInstanceOf(GetShipmentsResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments?MarketplaceId=ATVPDKIKX0DER&QueryType=SHIPMENT&ShipmentStatusList=WORKING,CLOSED', urldecode($request->url()));

            return true;
        });
    }

    public function testGetShipmentsIssuesInvalidShipmentStatus()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/issues/issue-55-invalid-shipment-status');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getShipments(
            marketplace_id: 'ATVPDKIKX0DER',
            query_type: 'SHIPMENT',
            shipment_status_list: ['WORKING', 'CLOSED'],
        );

        $this->assertInstanceOf(GetShipmentsResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments?MarketplaceId=ATVPDKIKX0DER&QueryType=SHIPMENT&ShipmentStatusList=WORKING,CLOSED', urldecode($request->url()));

            return true;
        });
    }

    public function testGetShipmentsIssuesMissingShipFromAddress()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/issues/issue-65-ship-from-address-empty');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getShipments(
            marketplace_id: 'ATVPDKIKX0DER',
            query_type: 'SHIPMENT',
            shipment_status_list: ['WORKING', 'CLOSED'],
        );

        $this->assertInstanceOf(GetShipmentsResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/shipments?MarketplaceId=ATVPDKIKX0DER&QueryType=SHIPMENT&ShipmentStatusList=WORKING,CLOSED', urldecode($request->url()));

            return true;
        });
    }

    public static function transportDetailsDataProvider()
    {
        return [
            ['issue-2-is-partnered-null'],
            ['issue-3-carrier-name-null'],
            ['issue-6-tracking-id-null'],
            ['issue-7-pallet-list-array'],
            ['issue-8-amazon-calc-value-null'],
            ['issue-47-null-pallet-list'],
        ];
    }

    public static function shipmentItemsDataProvider()
    {
        return [
            ['issue-9-prep-instruction-null'],
        ];
    }
}
