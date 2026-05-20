<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentTransactions20211228\GetTransactionStatusResponse;
use Jasara\AmznSPA\Resources\VendorDirectFulfillmentTransactions20211228Resource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(VendorDirectFulfillmentTransactions20211228Resource::class)]
class VendorDirectFulfillmentTransactions20211228ResourceTest extends UnitTestCase
{
    public function test_get_transaction_status(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-transactions20211228/get-transaction-status');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_transactions20211228->getTransactionStatus(
            transaction_id: 'transactionIdValue',
        );

        $this->assertInstanceOf(GetTransactionStatusResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/transactions/2021-12-28/transactions/transactionIdValue', urldecode($request->url()));

            return true;
        });
    }
}
