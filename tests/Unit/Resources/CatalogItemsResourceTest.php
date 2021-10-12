<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Responses\CatalogItems\GetCatalogItemResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\CatalogItems\ItemSearchResults;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Resources\CatalogItemsResource
 */
class CatalogItemsResourceTest extends UnitTestCase
{
    public function testSearchCatalogItems()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('catalog-items/search');

        $keyword = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->catalog_items->searchCatalogItems(
            keywords: [$keyword],
            marketplace_ids: ['ATVPDKIKX0DER'],
            included_data: ['images'],
            brand_names: ['BRAND'],
            classification_ids: ['ID'],
        );

        $this->assertInstanceOf(ItemSearchResults::class, $response);
        $this->assertEquals('B07N4M94X4', $response->items->first()->asin);

        $http->assertSent(function (Request $request) use ($keyword) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/catalog/2020-12-01/items?keywords=' . $keyword . '&marketplaceIds=ATVPDKIKX0DER&includedData=images&brandNames=BRAND&classificationIds=ID', $request->url());

            return true;
        });
    }

    public function testGetCatalogItem()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('catalog-items/get');

        $asin = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->catalog_items->getCatalogItem(
            asin: $asin,
            marketplace_ids: ['ATVPDKIKX0DER'],
            included_data: ['images'],
        );

        $this->assertInstanceOf(GetCatalogItemResponse::class, $response);
        $this->assertEquals('B07N4M94X4', $response->item->asin);

        $http->assertSent(function (Request $request) use ($asin) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/catalog/2020-12-01/items/' . $asin . '?marketplaceIds=ATVPDKIKX0DER&includedData=images', $request->url());

            return true;
        });
    }

    public function testGetCatalogItem_Issue10_404()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('catalog-items/issues/issue-10-404-not-found');

        $asin = 'B0AABBCC';

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->catalog_items->getCatalogItem(
            asin: $asin,
            marketplace_ids: ['ATVPDKIKX0DER'],
            included_data: ['images'],
        );

        $this->assertInstanceOf(GetCatalogItemResponse::class, $response);
        $this->assertEquals('NOT_FOUND', $response->errors[0]->code);

        $http->assertSent(function (Request $request) use ($asin) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/catalog/2020-12-01/items/' . $asin . '?marketplaceIds=ATVPDKIKX0DER&includedData=images', $request->url());

            return true;
        });
    }
}
