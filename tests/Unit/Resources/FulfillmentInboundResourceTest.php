<?php

namespace Jasara\AmznSPA\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DTOs\Responses\FulfillmentInbound\GetInboundGuidanceResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class FulfillmentInboundResourceTest extends UnitTestCase
{
    public function testGetInboundGuidance()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-inbound/get-inbound-guidance');

        $sku = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound->getInboundGuidance('ATVPDKIKX0DER', [$sku]);

        $this->assertInstanceOf(GetInboundGuidanceResponse::class, $response);

        $http->assertSent(function (Request $request) use ($sku) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inbound/v0/itemsGuidance?MarketplaceId=ATVPDKIKX0DER&SellerSKUList[0]=' . $sku, urldecode($request->url()));

            return true;
        });
    }
}
