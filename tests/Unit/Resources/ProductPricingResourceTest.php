<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Responses\ProductPricing\GetPricingResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class ProductPricingResourceTest extends UnitTestCase
{
    public function testGetPricing()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('/product-price/get-pricing');

        $item_type = 'asin';
        $marketplace_id = 'ATVPDKIKX0DER';

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->product_pricing->getPricing(
            marketplace_id: $marketplace_id,
            item_type:  $item_type
        );

        $this->assertInstanceOf(GetPricingResponse::class, $response);

        $price = $response->payload->first();

        $this->assertEquals('Success', $price->status);
        $this->assertEquals('B00V5DG6IQ', $price->asin);
        $this->assertEquals('ATVPDKIKX0DER', $price->product->identifiers->marketplace_asin->marketplace_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/products/pricing/v0/price', $request->url());

            return true;
        });
    }
}
