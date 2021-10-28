<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Responses\ProductPricing\GetOffersResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\ProductPricing\GetPricingResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class ProductPricingResourceTest extends UnitTestCase
{
    public function testGetPricing()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('/product-pricing/get-pricing');

        $item_type = 'asin';
        $marketplace_id = 'ATVPDKIKX0DER';

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->product_pricing->getPricing(
            marketplace_id: $marketplace_id,
            item_type:  $item_type,
        );

        $this->assertInstanceOf(GetPricingResponse::class, $response);

        $price = $response->payload->first();

        $this->assertEquals('Success', $price->status);
        $this->assertEquals('B00V5DG6IQ', $price->asin);
        $this->assertEquals('ATVPDKIKX0DER', $price->product->identifiers->marketplace_asin->marketplace_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/products/pricing/v0/price?MarketplaceId=ATVPDKIKX0DER&ItemType=asin&ItemCondition=USED&OfferType=B2C', $request->url());

            return true;
        });
    }

    public function testGetCompetitivePricing()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('/product-pricing/get-competitive-pricing');

        $item_type = 'Asin';
        $marketplace_id = 'ATVPDKIKX0DER';

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->product_pricing->getCompetitivePricing(
            marketplace_id: $marketplace_id,
            item_type:  $item_type,
        );

        $this->assertInstanceOf(GetPricingResponse::class, $response);

        $competitive_price = $response->payload->first();

        $this->assertEquals('Success', $competitive_price->status);
        $this->assertEquals('B00V5DG6IQ', $competitive_price->asin);
        $this->assertEquals(10.00, $competitive_price->product->offers[0]->buying_price->listing_price->amount);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/products/pricing/v0/competitivePrice?MarketplaceId=ATVPDKIKX0DER&ItemType=Asin&CustomerType=Consumer', $request->url());

            return true;
        });
    }

    public function testGetListingOffers()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('/product-pricing/get-listing-offers');

        $marketplace_id = 'ATVPDKIKX0DER';
        $item_condition = 'CLUB';
        $seller_sku = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->product_pricing->getListingOffers(
            marketplace_id: $marketplace_id,
            item_condition: $item_condition,
            seller_sku: $seller_sku,
        );

        $this->assertInstanceOf(GetOffersResponse::class, $response);

        $offers = $response->payload;

        $this->assertEquals('ATVPDKIKX0DER', $offers->marketplace_id);
        $this->assertEquals('NEW', $offers->item_condition);
        $this->assertEquals('NABetaASINB00V5DG6IQ', $offers->identifier->seller_sku);

        $http->assertSent(function (Request $request) use ($seller_sku) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/products/pricing/v0/listings/' . $seller_sku . '/offers?MarketplaceId=ATVPDKIKX0DER&ItemCondition=CLUB&CustomerType=Business', $request->url());

            return true;
        });
    }

    public function testGetItemOffers()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('/product-pricing/get-item-offers');

        $marketplace_id = 'ATVPDKIKX0DER';
        $item_condition = 'NEW';
        $asin = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->product_pricing->getItemOffers(
            marketplace_id: $marketplace_id,
            item_condition: $item_condition,
            asin: $asin,
        );

        $this->assertInstanceOf(GetOffersResponse::class, $response);

        $items = $response->payload;

        $this->assertEquals('ATVPDKIKX0DER', $items->marketplace_id);
        $this->assertEquals('NEW', $items->item_condition);
        $this->assertEquals('B00V5DG6IQ', $items->identifier->asin);

        $http->assertSent(function (Request $request) use ($asin) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/products/pricing/v0/items/' . $asin . '/offers?MarketplaceId=ATVPDKIKX0DER&ItemCondition=NEW&CustomerType=Consumer', $request->url());

            return true;
        });
    }
}
