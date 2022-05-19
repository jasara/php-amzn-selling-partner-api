<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources\CatalogItems;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Responses\CatalogItems\v20220401\GetCatalogItemResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\CatalogItems\v20220401\ItemSearchResults;
use Jasara\AmznSPA\Enums\CatalogItems\ItemIdentifierTypes;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Resources\CatalogItems\CatalogItems20220401Resource
 */
class CatalogItems20220401ResourceTest extends UnitTestCase
{
    public function testSearchCatalogItems()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('catalog-items/v20220401/search');

        $identifier = Str::random();
        $identifiers_type = Arr::random(ItemIdentifierTypes::cases())->value;

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->catalog_items20220401->searchCatalogItems(
            identifiers: $identifiers = [Str::random()],
            identifiers_type: $identifiers_type,
            keywords: $keywords = [Str::random()],
            marketplace_ids: $marketplace_ids = ['ATVPDKIKX0DER'],
            included_data: $included_data = ['images'],
            brand_names: $brand_names = ['BRAND'],
            classification_ids: $classification_ids = ['ID'],
        );

        $this->assertInstanceOf(ItemSearchResults::class, $response);
        $this->assertEquals('B07N4M94X4', $response->items->first()->asin);

        $this->assertRequestSent(
            $http,
            'https://sellingpartnerapi-na.amazon.com/catalog/2022-04-01/items',
            compact('identifiers', 'identifiers_type', 'keywords', 'marketplace_ids', 'included_data', 'brand_names', 'classification_ids')
        );
    }

    public function testGetCatalogItem()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('catalog-items/v20220401/get');

        $asin = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->catalog_items20220401->getCatalogItem(
            asin: $asin,
            marketplace_ids: $marketplace_ids = ['ATVPDKIKX0DER'],
            included_data: $included_data = ['images'],
        );

        $this->assertInstanceOf(GetCatalogItemResponse::class, $response);
        $this->assertEquals('B07N4M94X4', $response->item->asin);

        $this->assertRequestSent(
            $http,
            'https://sellingpartnerapi-na.amazon.com/catalog/2022-04-01/items/' . $asin,
            compact('marketplace_ids', 'included_data'),
        );
    }
}
