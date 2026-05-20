<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentTransactions\GetTransactionStatusResponse;
use Jasara\AmznSPA\Resources\VendorDirectFulfillmentTransactionsResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(VendorDirectFulfillmentTransactionsResource::class)]
class VendorDirectFulfillmentTransactionsResourceTest extends UnitTestCase
{
    public function test_get_transaction_status(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-transactions/get-transaction-status');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_transactions->getTransactionStatus(
            transaction_id: 'transactionIdValue',
        );

        $this->assertInstanceOf(GetTransactionStatusResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/transactions/v1/transactions/transactionIdValue', urldecode($request->url()));

            return true;
        });
    }
}
