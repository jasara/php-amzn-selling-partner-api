<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping20211228\CreateContainerLabelResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping20211228\CreateShippingLabelsResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping20211228\GetCustomerInvoiceResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping20211228\GetCustomerInvoicesResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping20211228\GetPackingSlipResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping20211228\GetPackingSlipsResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping20211228\GetShippingLabelResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping20211228\GetShippingLabelsResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping20211228\SubmitShipmentConfirmationsResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping20211228\SubmitShipmentStatusUpdatesResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping20211228\SubmitShippingLabelRequestResponse;
use Jasara\AmznSPA\Resources\VendorDirectFulfillmentShipping20211228Resource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(VendorDirectFulfillmentShipping20211228Resource::class)]
class VendorDirectFulfillmentShipping20211228ResourceTest extends UnitTestCase
{
    public function test_get_shipping_labels(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping20211228/get-shipping-labels');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_shipping20211228->getShippingLabels(
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
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/2021-12-28/shippingLabels?createdAfter=createdAfterValue&createdBefore=createdBeforeValue&shipFromPartyId=shipFromPartyIdValue&limit=10&sortOrder=sortOrderValue&nextToken=nextTokenValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_submit_shipping_label_request(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping20211228/submit-shipping-label-request');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_shipping20211228->submitShippingLabelRequest(
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
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/2021-12-28/shippingLabels', urldecode($request->url()));
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
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping20211228/get-shipping-label');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_shipping20211228->getShippingLabel(
            purchase_order_number: 'purchaseOrderNumberValue',
        );

        $this->assertInstanceOf(GetShippingLabelResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/2021-12-28/shippingLabels/purchaseOrderNumberValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_create_shipping_labels(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping20211228/create-shipping-labels');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_shipping20211228->createShippingLabels(
            purchase_order_number: 'purchaseOrderNumberValue',
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(CreateShippingLabelsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/2021-12-28/shippingLabels/purchaseOrderNumberValue', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_submit_shipment_confirmations(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping20211228/submit-shipment-confirmations');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_shipping20211228->submitShipmentConfirmations(
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
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/2021-12-28/shipmentConfirmations', urldecode($request->url()));
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
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping20211228/submit-shipment-status-updates');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_shipping20211228->submitShipmentStatusUpdates(
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
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/2021-12-28/shipmentStatusUpdates', urldecode($request->url()));
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
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping20211228/get-customer-invoices');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_shipping20211228->getCustomerInvoices(
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
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/2021-12-28/customerInvoices?createdAfter=createdAfterValue&createdBefore=createdBeforeValue&shipFromPartyId=shipFromPartyIdValue&limit=10&sortOrder=sortOrderValue&nextToken=nextTokenValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_get_customer_invoice(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping20211228/get-customer-invoice');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_shipping20211228->getCustomerInvoice(
            purchase_order_number: 'purchaseOrderNumberValue',
        );

        $this->assertInstanceOf(GetCustomerInvoiceResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/2021-12-28/customerInvoices/purchaseOrderNumberValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_get_packing_slips(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping20211228/get-packing-slips');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_shipping20211228->getPackingSlips(
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
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/2021-12-28/packingSlips?createdAfter=createdAfterValue&createdBefore=createdBeforeValue&shipFromPartyId=shipFromPartyIdValue&limit=10&sortOrder=sortOrderValue&nextToken=nextTokenValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_get_packing_slip(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping20211228/get-packing-slip');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_shipping20211228->getPackingSlip(
            purchase_order_number: 'purchaseOrderNumberValue',
        );

        $this->assertInstanceOf(GetPackingSlipResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/2021-12-28/packingSlips/purchaseOrderNumberValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_create_container_label(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-shipping20211228/create-container-label');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_shipping20211228->createContainerLabel(
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(CreateContainerLabelResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/shipping/2021-12-28/containerLabel', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }
}
