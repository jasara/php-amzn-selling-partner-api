<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\Resources\ResourceGetter;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\GetCustomerInvoiceResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\GetCustomerInvoicesResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\GetPackingSlipResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\GetPackingSlipsResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\GetShippingLabelResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\GetShippingLabelsResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\SubmitShipmentConfirmationsResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\SubmitShipmentStatusUpdatesResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\SubmitShippingLabelRequestResponse;
use Jasara\AmznSPA\Resources\VendorDirectFulfillmentShippingResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(VendorDirectFulfillmentShippingResource::class)]
class VendorDirectFulfillmentShippingResourceTest extends UnitTestCase
{
    public function test_get_shipping_labels(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping/get-shipping-labels');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getVendorDirectFulfillmentShipping();
        $response = $resource->getShippingLabels(
            created_after: 'createdAfterValue',
            created_before: 'createdBeforeValue',
            ship_from_party_id: 'shipFromPartyIdValue',
            limit: 10,
            sort_order: 'sortOrderValue',
            next_token: 'nextTokenValue',
        );

        $this->assertInstanceOf(GetShippingLabelsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/v1/shippingLabels?createdAfter=createdAfterValue&createdBefore=createdBeforeValue&shipFromPartyId=shipFromPartyIdValue&limit=10&sortOrder=sortOrderValue&nextToken=nextTokenValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_submit_shipping_label_request(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping/submit-shipping-label-request');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getVendorDirectFulfillmentShipping();
        $response = $resource->submitShippingLabelRequest(
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(SubmitShippingLabelRequestResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/v1/shippingLabels', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_get_shipping_label(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping/get-shipping-label');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getVendorDirectFulfillmentShipping();
        $response = $resource->getShippingLabel(
            purchase_order_number: 'purchaseOrderNumberValue',
        );

        $this->assertInstanceOf(GetShippingLabelResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/v1/shippingLabels/purchaseOrderNumberValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_submit_shipment_confirmations(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping/submit-shipment-confirmations');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getVendorDirectFulfillmentShipping();
        $response = $resource->submitShipmentConfirmations(
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(SubmitShipmentConfirmationsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/v1/shipmentConfirmations', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_submit_shipment_status_updates(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping/submit-shipment-status-updates');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getVendorDirectFulfillmentShipping();
        $response = $resource->submitShipmentStatusUpdates(
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(SubmitShipmentStatusUpdatesResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/v1/shipmentStatusUpdates', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_get_customer_invoices(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping/get-customer-invoices');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getVendorDirectFulfillmentShipping();
        $response = $resource->getCustomerInvoices(
            created_after: 'createdAfterValue',
            created_before: 'createdBeforeValue',
            ship_from_party_id: 'shipFromPartyIdValue',
            limit: 10,
            sort_order: 'sortOrderValue',
            next_token: 'nextTokenValue',
        );

        $this->assertInstanceOf(GetCustomerInvoicesResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/v1/customerInvoices?createdAfter=createdAfterValue&createdBefore=createdBeforeValue&shipFromPartyId=shipFromPartyIdValue&limit=10&sortOrder=sortOrderValue&nextToken=nextTokenValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_get_customer_invoice(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping/get-customer-invoice');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getVendorDirectFulfillmentShipping();
        $response = $resource->getCustomerInvoice(
            purchase_order_number: 'purchaseOrderNumberValue',
        );

        $this->assertInstanceOf(GetCustomerInvoiceResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/v1/customerInvoices/purchaseOrderNumberValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_get_packing_slips(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping/get-packing-slips');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getVendorDirectFulfillmentShipping();
        $response = $resource->getPackingSlips(
            created_after: 'createdAfterValue',
            created_before: 'createdBeforeValue',
            ship_from_party_id: 'shipFromPartyIdValue',
            limit: 10,
            sort_order: 'sortOrderValue',
            next_token: 'nextTokenValue',
        );

        $this->assertInstanceOf(GetPackingSlipsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/v1/packingSlips?createdAfter=createdAfterValue&createdBefore=createdBeforeValue&shipFromPartyId=shipFromPartyIdValue&limit=10&sortOrder=sortOrderValue&nextToken=nextTokenValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_get_packing_slip(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping/get-packing-slip');

        $config->setMarketplace('ATVPDKIKX0DER');
        $resource = (new ResourceGetter($config))->getVendorDirectFulfillmentShipping();
        $response = $resource->getPackingSlip(
            purchase_order_number: 'purchaseOrderNumberValue',
        );

        $this->assertInstanceOf(GetPackingSlipResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/v1/packingSlips/purchaseOrderNumberValue', urldecode($request->url()));

            return true;
        });
    }
}
