<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Requests\Tokens\CreateRestrictedDataTokenRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\Tokens\CreateRestrictedDataTokenResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class TokensResourceTest extends UnitTestCase
{
    public function testCreateRestrictedDataToken()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('tokens/create-restricted-data-token');

        $request = new CreateRestrictedDataTokenRequest(
            restricted_resources: [
                [
                    'method' => 'GET',
                    'path' => '/orders/v0/orders',
                    'data_elements' => ['buyerInfo', 'shippingAddress'],
                ],
            ],
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->tokens->createRestrictedDataToken($request);

        $this->assertInstanceOf(CreateRestrictedDataTokenResponse::class, $response);
        $this->assertEquals('Atz.sprdt|IQEBLjAsAhRmHjNgHpi0U-Dme37rR6CuUpSR', $response->restricted_data_token);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/tokens/2021-03-01/restrictedDataToken', urldecode($request->url()));

            return true;
        });
    }
}
