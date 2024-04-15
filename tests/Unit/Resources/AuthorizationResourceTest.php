<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\GetAuthorizationCodeResponse;
use Jasara\AmznSPA\Exceptions\GrantlessAuthenticationException;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Jasara\AmznSPA\Resources\AuthorizationResource::class)]
#[CoversClass(GrantlessAuthenticationException::class)]
class AuthorizationResourceTest extends UnitTestCase
{
    public function testGetAuthorizationCodeFromMwsToken()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('authorization/get-authorization-code');

        $seller_id = Str::random();
        $developer_id = Str::random();
        $mws_auth_token = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->authorization->getAuthorizationCodeFromMwsToken($seller_id, $developer_id, $mws_auth_token);

        $this->assertInstanceOf(GetAuthorizationCodeResponse::class, $response);

        $http->assertSent(function (Request $request) use ($seller_id, $developer_id, $mws_auth_token) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/authorization/v1/authorizationCode?sellingPartnerId='.$seller_id.'&developerId='.$developer_id.'&mwsAuthToken='.$mws_auth_token, urldecode($request->url()));

            return true;
        });
    }

    public function testGetAuthorizationCodeNoAuthorizationExistsError()
    {
        $this->expectException(GrantlessAuthenticationException::class);

        list($config, $http) = $this->setupConfigWithFakeHttp('authorization/no-authorization-exists-error', 400);

        $seller_id = Str::random();
        $developer_id = Str::random();
        $mws_auth_token = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $amzn->authorization->getAuthorizationCodeFromMwsToken($seller_id, $developer_id, $mws_auth_token);

        $http->assertSent(function (Request $request) use ($seller_id, $developer_id, $mws_auth_token) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/authorization/v1/authorizationCode?sellingPartnerId='.$seller_id.'&developerId='.$developer_id.'&mwsAuthToken='.$mws_auth_token, urldecode($request->url()));

            return true;
        });
    }

    public function testGetAuthorizationCodeNoAuthorizationFoundError()
    {
        $this->expectException(GrantlessAuthenticationException::class);

        list($config, $http) = $this->setupConfigWithFakeHttp('authorization/no-authorization-found-error', 400);

        $seller_id = Str::random();
        $developer_id = Str::random();
        $mws_auth_token = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $amzn->authorization->getAuthorizationCodeFromMwsToken($seller_id, $developer_id, $mws_auth_token);

        $http->assertSent(function (Request $request) use ($seller_id, $developer_id, $mws_auth_token) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/authorization/v1/authorizationCode?sellingPartnerId='.$seller_id.'&developerId='.$developer_id.'&mwsAuthToken='.$mws_auth_token, urldecode($request->url()));

            return true;
        });
    }
}
