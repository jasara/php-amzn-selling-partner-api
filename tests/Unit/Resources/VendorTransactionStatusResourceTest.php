<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\VendorTransactionStatus\GetTransactionResponse;
use Jasara\AmznSPA\Resources\VendorTransactionStatusResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(VendorTransactionStatusResource::class)]
class VendorTransactionStatusResourceTest extends UnitTestCase
{
    public function test_get_transaction(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-transaction-status/get-transaction');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_transaction_status->getTransaction(
            transaction_id: 'transactionIdValue',
        );

        $this->assertInstanceOf(GetTransactionResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/transactions/v1/transactions/transactionIdValue', urldecode($request->url()));

            return true;
        });
    }
}
