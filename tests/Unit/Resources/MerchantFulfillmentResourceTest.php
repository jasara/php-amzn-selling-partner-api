<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Requests\MerchantFulfillment\CreateShipmentRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\MerchantFulfillment\GetAdditionalSellerInputsRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\MerchantFulfillment\GetEligibleShipmentServicesRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment\CancelShipmentResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment\CreateShipmentResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment\GetAdditionalSellerInputsResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment\GetEligibleShipmentServicesResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment\GetShipmentResponse;
use Jasara\AmznSPA\Tests\Setup\SetupMerchantFulfillmentRequest;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Jasara\AmznSPA\Resources\MerchantFulfillmentResource::class)]
class MerchantFulfillmentResourceTest extends UnitTestCase
{
    use SetupMerchantFulfillmentRequest;

    public function testGetEligibleShipmentServicesOld()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('merchant-fulfillment/get-eligible-shipment-services-old');

        $request = new GetEligibleShipmentServicesRequest(
            shipment_request_details: $this->shipmentRequestDetails(),
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->merchant_fulfillment->getEligibleShipmentServicesOld($request);

        $this->assertInstanceOf(GetEligibleShipmentServicesResponse::class, $response);
        $this->assertEquals('UPS', $response->payload->shipping_service_list[0]->carrier_name);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/mfn/v0/eligibleServices', urldecode($request->url()));

            return true;
        });
    }

    public function testGetEligibleShipmentServices()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('merchant-fulfillment/get-eligible-shipment-services-old');

        $request = new GetEligibleShipmentServicesRequest(
            shipment_request_details: $this->shipmentRequestDetails(),
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->merchant_fulfillment->getEligibleShipmentServices($request);

        $this->assertInstanceOf(GetEligibleShipmentServicesResponse::class, $response);
        $this->assertEquals('UPS', $response->payload->shipping_service_list[0]->carrier_name);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/mfn/v0/eligibleShippingServices', urldecode($request->url()));

            return true;
        });
    }

    public function testGetShipment()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp(['tokens/create-restricted-data-token', 'merchant-fulfillment/get-shipment']);

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->merchant_fulfillment->getShipment($shipment_id);

        $this->assertInstanceOf(GetShipmentResponse::class, $response);
        $this->assertEquals('abcddcba-00c3-4f6f-a63a-639f76ee9253', $response->payload->shipment_id);

        $request_validation = [
            function (Request $request) {
                $this->assertEquals('POST', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/tokens/2021-03-01/restrictedDataToken', $request->url());

                return true;
            },
            function (Request $request) use ($shipment_id) {
                $this->assertEquals('GET', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/mfn/v0/shipments/'.$shipment_id, $request->url());

                return true;
            },
        ];

        $http->assertSentInOrder($request_validation);
    }

    public function testCancelShipment()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('merchant-fulfillment/cancel-shipment');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->merchant_fulfillment->cancelShipment($shipment_id);

        $this->assertInstanceOf(CancelShipmentResponse::class, $response);
        $this->assertEquals('be7a0a53-00c3-4f6f-a63a-639f76ee9253', $response->payload->shipment_id);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('DELETE', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/mfn/v0/shipments/'.$shipment_id, $request->url());

            return true;
        });
    }

    public function testCancelShipmentOld()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('merchant-fulfillment/cancel-shipment');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->merchant_fulfillment->cancelShipmentOld($shipment_id);

        $this->assertInstanceOf(CancelShipmentResponse::class, $response);
        $this->assertEquals('be7a0a53-00c3-4f6f-a63a-639f76ee9253', $response->payload->shipment_id);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/mfn/v0/shipments/'.$shipment_id.'/cancel', $request->url());

            return true;
        });
    }

    public function testCreateShipment()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('merchant-fulfillment/create-shipment');
        $request = new CreateShipmentRequest(
            shipment_request_details: $this->shipmentRequestDetails(),
            shipping_service_id: Str::random(),
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->merchant_fulfillment->createShipment($request);

        $this->assertInstanceOf(CreateShipmentResponse::class, $response);
        $this->assertEquals('903-5563053-5647845', $response->payload->amazon_order_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/mfn/v0/shipments/', urldecode($request->url()));

            return true;
        });
    }

    public function testGetAdditionalSellerInputsOld()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('merchant-fulfillment/get-additional-seller-inputs-old');
        $request = new GetAdditionalSellerInputsRequest(
            shipping_service_id: Str::random(),
            ship_from_address: $this->setupAddress(),
            order_id: Str::random()
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->merchant_fulfillment->getAdditionalSellerInputsOld($request);

        $this->assertInstanceOf(GetAdditionalSellerInputsResponse::class, $response);
        $this->assertEquals('John Doe', $response->payload->shipment_level_fields[0]->additional_input_field_name);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/mfn/v0/sellerInputs', urldecode($request->url()));

            return true;
        });
    }

    public function testGetAdditionalSellerInputs()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('merchant-fulfillment/get-additional-seller-inputs-old');
        $request = new GetAdditionalSellerInputsRequest(
            shipping_service_id: Str::random(),
            ship_from_address: $this->setupAddress(),
            order_id: Str::random()
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->merchant_fulfillment->getAdditionalSellerInputs($request);

        $this->assertInstanceOf(GetAdditionalSellerInputsResponse::class, $response);
        $this->assertEquals('John Doe', $response->payload->shipment_level_fields[0]->additional_input_field_name);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/mfn/v0/additionalSellerInputs', urldecode($request->url()));

            return true;
        });
    }
}
