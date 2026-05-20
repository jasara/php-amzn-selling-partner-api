<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\Transfers\GetPaymentMethodsResponse;
use Jasara\AmznSPA\Data\Responses\Transfers\InitiatePayoutResponse;
use Jasara\AmznSPA\Resources\TransfersResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(TransfersResource::class)]
class TransfersResourceTest extends UnitTestCase
{
    public function test_initiate_payout(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('transfers/initiate-payout');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->transfers->initiatePayout(
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(InitiatePayoutResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/finances/transfers/2024-06-01/payouts', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_get_payment_methods(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('transfers/get-payment-methods');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->transfers->getPaymentMethods(
            marketplace_id: 'ATVPDKIKX0DER',
            payment_method_types: [
                0 => 'paymentMethodTypesOne',
                1 => 'paymentMethodTypesTwo',
            ],
        );

        $this->assertInstanceOf(GetPaymentMethodsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/finances/transfers/2024-06-01/paymentMethods?marketplaceId=ATVPDKIKX0DER&paymentMethodTypes=paymentMethodTypesOne,paymentMethodTypesTwo', urldecode($request->url()));

            return true;
        });
    }
}
