<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentInventory\SubmitInventoryUpdateResponse;
use Jasara\AmznSPA\Resources\VendorDirectFulfillmentInventoryResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(VendorDirectFulfillmentInventoryResource::class)]
class VendorDirectFulfillmentInventoryResourceTest extends UnitTestCase
{
    public function test_submit_inventory_update(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-inventory/submit-inventory-update');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_inventory->submitInventoryUpdate(
            warehouse_id: 'warehouseIdValue',
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(SubmitInventoryUpdateResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/inventory/v1/warehouses/warehouseIdValue/items', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }
}
