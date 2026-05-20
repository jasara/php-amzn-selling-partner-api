<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\VendorOrders\GetPurchaseOrderResponse;
use Jasara\AmznSPA\Data\Responses\VendorOrders\GetPurchaseOrdersResponse;
use Jasara\AmznSPA\Data\Responses\VendorOrders\GetPurchaseOrdersStatusResponse;
use Jasara\AmznSPA\Data\Responses\VendorOrders\SubmitAcknowledgementResponse;
use Jasara\AmznSPA\Resources\VendorOrdersResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(VendorOrdersResource::class)]
class VendorOrdersResourceTest extends UnitTestCase
{
    public function test_get_purchase_orders(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-orders/get-purchase-orders');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_orders->getPurchaseOrders(
            limit: 10,
            created_after: 'createdAfterValue',
            created_before: 'createdBeforeValue',
            sort_order: 'sortOrderValue',
            next_token: 'nextTokenValue',
            include_details: 'includeDetailsValue',
            changed_after: 'changedAfterValue',
            changed_before: 'changedBeforeValue',
            po_item_state: 'poItemStateValue',
            is_po_changed: 'isPOChangedValue',
            purchase_order_state: 'purchaseOrderStateValue',
            ordering_vendor_code: 'orderingVendorCodeValue',
        );

        $this->assertInstanceOf(GetPurchaseOrdersResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/orders/v1/purchaseOrders?limit=10&createdAfter=createdAfterValue&createdBefore=createdBeforeValue&sortOrder=sortOrderValue&nextToken=nextTokenValue&includeDetails=includeDetailsValue&changedAfter=changedAfterValue&changedBefore=changedBeforeValue&poItemState=poItemStateValue&isPOChanged=isPOChangedValue&purchaseOrderState=purchaseOrderStateValue&orderingVendorCode=orderingVendorCodeValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_get_purchase_order(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-orders/get-purchase-order');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_orders->getPurchaseOrder(
            purchase_order_number: 'purchaseOrderNumberValue',
        );

        $this->assertInstanceOf(GetPurchaseOrderResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/orders/v1/purchaseOrders/purchaseOrderNumberValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_submit_acknowledgement(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-orders/submit-acknowledgement');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_orders->submitAcknowledgement(
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(SubmitAcknowledgementResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/orders/v1/acknowledgements', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_get_purchase_orders_status(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-orders/get-purchase-orders-status');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_orders->getPurchaseOrdersStatus(
            limit: 10,
            sort_order: 'sortOrderValue',
            next_token: 'nextTokenValue',
            created_after: 'createdAfterValue',
            created_before: 'createdBeforeValue',
            updated_after: 'updatedAfterValue',
            updated_before: 'updatedBeforeValue',
            purchase_order_number: 'purchaseOrderNumberValue',
            purchase_order_status: 'purchaseOrderStatusValue',
            item_confirmation_status: 'itemConfirmationStatusValue',
            item_receive_status: 'itemReceiveStatusValue',
            ordering_vendor_code: 'orderingVendorCodeValue',
            ship_to_party_id: 'shipToPartyIdValue',
        );

        $this->assertInstanceOf(GetPurchaseOrdersStatusResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/orders/v1/purchaseOrdersStatus?limit=10&sortOrder=sortOrderValue&nextToken=nextTokenValue&createdAfter=createdAfterValue&createdBefore=createdBeforeValue&updatedAfter=updatedAfterValue&updatedBefore=updatedBeforeValue&purchaseOrderNumber=purchaseOrderNumberValue&purchaseOrderStatus=purchaseOrderStatusValue&itemConfirmationStatus=itemConfirmationStatusValue&itemReceiveStatus=itemReceiveStatusValue&orderingVendorCode=orderingVendorCodeValue&shipToPartyId=shipToPartyIdValue', urldecode($request->url()));

            return true;
        });
    }
}
