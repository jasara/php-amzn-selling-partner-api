<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\Sellers\GetAccountResponse;
use Jasara\AmznSPA\Data\Responses\Sellers\GetMarketplaceParticipationsResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Jasara\AmznSPA\Resources\SellersResource::class)]
class SellersResourceTest extends UnitTestCase
{
    public function testGetMarketplaceParticipations()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('sellers/get-marketplace-participations');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->sellers->getMarketplaceParticipations();

        $this->assertInstanceOf(GetMarketplaceParticipationsResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/sellers/v1/marketplaceParticipations', $request->url());

            return true;
        });
    }

    public function testGetAccount()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('sellers/get-account');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->sellers->getAccount();

        $this->assertInstanceOf(GetAccountResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/sellers/v1/account', $request->url());

            return true;
        });
    }
}
