<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Requests\ListingsItems\ListingsItemPatchRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\ListingsItems\ListingsItemPutRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\ListingsItems\Item;
use Jasara\AmznSPA\DataTransferObjects\Responses\ListingsItems\ListingsItemSubmissionResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class ListingsItemsResourceTest extends UnitTestCase
{
    public function testGetListingsItem()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('listings-items/get-listings-item');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->listings_items->getListingsItem(
            $seller_id = Str::random(),
            $sku = Str::random(),
            $marketplace_ids = ['ATVPDKIKX0DER'],
            $issue_locale = '',
            $included_data = null,
        );

        $this->assertInstanceOf(Item::class, $response);

        $http->assertSent(function (Request $request) use ($seller_id, $sku) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . $sku . '?SellerIs=' . $seller_id . '&Sku=' . $sku . '&MarketplaceIds=ATVPDKIKX0DER', $request->url());

            return true;
        });
    }

    public function testPutListingsItem()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('listings-items/put-listings-item');

        $request = new ListingsItemPutRequest(
            product_type : Str::random(),
            requirements : 'LISTING',
            attributes : [

            ]
        );
        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->listings_items->putListingsItem(
            $seller_id = Str::random(),
            $sku = Str::random(),
            $marketplace_ids = ['ATVPDKIKX0DER'],
            $issue_locale = '',
            $request
        );

        $this->assertInstanceOf(ListingsItemSubmissionResponse::class, $response);

        $http->assertSent(function (Request $request) use ($seller_id, $sku) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . $sku, $request->url());

            return true;
        });
    }

    public function testDeleteListingsItem()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('listings-items/put-listings-item');

        $request = new ListingsItemPutRequest(
            product_type : Str::random(),
            requirements : 'LISTING',
            attributes : [

            ]
        );
        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->listings_items->deleteListingsItem(
            $seller_id = Str::random(),
            $sku = Str::random(),
            $marketplace_ids = ['ATVPDKIKX0DER'],
            $issue_locale = '',
        );

        $this->assertInstanceOf(ListingsItemSubmissionResponse::class, $response);

        $http->assertSent(function (Request $request) use ($seller_id, $sku) {
            $this->assertEquals('DELETE', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . $sku, $request->url());

            return true;
        });
    }

    public function testPatchListingsItem()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('listings-items/put-listings-item');

        $request = new ListingsItemPatchRequest(
            product_type : Str::random(),
            patches : [
                [
                    'op' => 'replace',
                    'path' => Str::random(),
                ],
            ]
        );
        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->listings_items->patchListingsItem(
            $seller_id = Str::random(),
            $sku = Str::random(),
            $marketplace_ids = ['ATVPDKIKX0DER'],
            $issue_locale = '',
            $request
        );

        $this->assertInstanceOf(ListingsItemSubmissionResponse::class, $response);

        $http->assertSent(function (Request $request) use ($seller_id, $sku) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . $sku, $request->url());

            return true;
        });
    }
}
