<?php

namespace Jasara\AmznSPA\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound\CreateInboundShipmentPlanRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound\InboundShipmentRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\CreateInboundShipmentPlanResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetInboundGuidanceResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetPreorderInfoResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\InboundShipmentResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\GetPrepInstructionsResultSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class FulfillmentInboundResourceTest extends UnitTestCase
{
    public function testGetInboundGuidance()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-inbound/get-inbound-guidance');

        $sku = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getInboundGuidance('ATVPDKIKX0DER', [$sku]);

        $this->assertInstanceOf(GetInboundGuidanceResponse::class, $response);

        $http->assertSent(function (Request $request) use ($sku) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/itemsGuidance?MarketplaceId=ATVPDKIKX0DER&SellerSKUList[0]=' . $sku, urldecode($request->url()));

            return true;
        });
    }

    public function testCreateInboundShipmentPlan()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-inbound/create-inbound-shipment-plan');

        $request = new CreateInboundShipmentPlanRequest(
            ship_from_address: $this->setupAddress(),
            label_prep_preference: 'SELLER_LABEL',
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->createInboundShipmentPlan($request);

        $this->assertInstanceOf(CreateInboundShipmentPlanResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/createInboundShipmentPlan', urldecode($request->url()));

            return true;
        });
    }

    public function testUpdateInboundShipment()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-inbound/update-inbound-shipment');

        $shipment_id = Str::random();

        $request = new InboundShipmentRequest(
            marketplace_id: 'ATVPDKIKX0DER',
            inbound_shipment_header: [
                'shipment_name' => Str::random(),
                'shipment_from_address' => $this->setupAddress(),
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
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-inbound/create-inbound-shipment');

        $shipment_id = Str::random();

        $request = new InboundShipmentRequest(
            marketplace_id: 'ATVPDKIKX0DER',
            inbound_shipment_header: [
                'shipment_name' => Str::random(),
                'shipment_from_address' => $this->setupAddress(),
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
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-inbound/get-preorder-info');

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

    public function testGetPrepInstructions()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-inbound/get-prep-instructions');

        $sku = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getPrepInstructions('US', [$sku]);

        $this->assertInstanceOf(GetPrepInstructionsResultSchema::class, $response);

        $http->assertSent(function (Request $request) use ($sku) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/prepInstructions?ShipToCountryCode=US&SellerSKUList[0]=' . $sku, urldecode($request->url()));

            return true;
        });
    }
}
