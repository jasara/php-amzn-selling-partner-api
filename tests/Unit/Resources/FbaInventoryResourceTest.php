<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Responses\CatalogItems\GetCatalogItemResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\CatalogItems\ItemSearchResults;
use Jasara\AmznSPA\DataTransferObjects\Responses\FbaInventory\GetInventorySummariesResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Resources\FbaInventoryResource
 */
class FbaInventoryResourceTest extends UnitTestCase
{
    public function testGetInventorySummaries()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fba-inventory/get-inventory-summaries');

        $sku = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fba_inventory->getInventorySummaries(
            granularity_type: 'Marketplace',
            granularity_id: 'ATVPDKIKX0DER',
            marketplace_ids: ['ATVPDKIKX0DER'],
            seller_skus: [$sku],
        );

        $this->assertInstanceOf(GetInventorySummariesResponse::class, $response);
        $this->assertEquals('seed', $response->pagination->next_token);
        $this->assertEquals('B0020MLK00', $response->payload->inventory_summaries->first()->asin);
        $this->assertEquals('B0020MLK00', $response->payload->inventory_summaries->first()->fnsku);

        $http->assertSent(function (Request $request) use ($sku) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/inventory/v1/summaries?granularityType=Marketplace&granularityId=ATVPDKIKX0DER&sellerSkus=' . $sku . '&marketplaceIds=ATVPDKIKX0DER', $request->url());

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
}
