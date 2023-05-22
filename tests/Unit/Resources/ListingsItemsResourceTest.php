<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Requests\ListingsItems\ListingsItemPatchRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\ListingsItems\ListingsItemPutRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\ListingsItems\GetListingsItemResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\ListingsItems\ListingsItemSubmissionResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\AttributeSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\AttributesListSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Resources\ListingsItemsResource
 */
class ListingsItemsResourceTest extends UnitTestCase
{
    public function testGetListingsItem()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('listings-items/get-listings-item');

        $sku = Str::random();
        $seller_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->listings_items->getListingsItem(
            sku: $sku,
            seller_id: $seller_id,
            marketplace_ids: ['ATVPDKIKX0DER'],
            issue_locale: '',
            included_data: ['summaries'],
        );

        $this->assertInstanceOf(GetListingsItemResponse::class, $response);
        $this->assertEquals('GM-ZDPI-9B4E', $response->item->sku);

        $http->assertSent(function (Request $request) use ($seller_id, $sku) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . '/' . $sku . '?marketplaceIds=ATVPDKIKX0DER&includedData=summaries', $request->url());

            return true;
        });
    }

    public function testPutListingsItem()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('listings-items/put-listings-item');

        $request = new ListingsItemPutRequest(
            product_type: $product_type = Str::random(),
            requirements: 'LISTING',
            attributes: new AttributesListSchema([
                new AttributeSchema(
                    attribute_name: 'bullet_point',
                    value: 'test',
                    marketplace_id: 'ATVPDKIKX0DER',
                ),
                new AttributeSchema(
                    attribute_name: 'bullet_point',
                    value: 'test_2',
                    marketplace_id: 'ATVPDKIKX0DER',
                ),
            ]),
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

        $http->assertSent(function (Request $request) use ($seller_id, $sku, $product_type) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . '/' . $sku . '?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals('{"productType":"' . $product_type . '","requirements":"LISTING","attributes":{"bullet_point":[{"value":"test","marketplace_id":"ATVPDKIKX0DER"},{"value":"test_2","marketplace_id":"ATVPDKIKX0DER"}]}}', $request->body());

            return true;
        });
    }

    public function testDeleteListingsItem()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('listings-items/put-listings-item');

        $request = new ListingsItemPutRequest(
            product_type: Str::random(),
            requirements: 'LISTING',
            attributes: [

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
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . '/' . $sku, $request->url());

            return true;
        });
    }

    public function testPatchListingsItem()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('listings-items/put-listings-item');

        $request = new ListingsItemPatchRequest(
            product_type: Str::random(),
            patches: [
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
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . '/' . $sku . '?marketplaceIds[0]=ATVPDKIKX0DER', urldecode($request->url()));

            return true;
        });
    }

    /**
     * @testWith ["amzn.gr.CW - #4 Brown-5gI2bvgCaM-7Cz8-VG"]
     */
    public function testGetListingsItemSkuIssues(string $sku): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('listings-items/get-listings-item');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->listings_items->getListingsItem(
            sku: $sku,
            seller_id: $seller_id = Str::random(),
            marketplace_ids: ['ATVPDKIKX0DER'],
        );

        $this->assertInstanceOf(GetListingsItemResponse::class, $response);

        $http->assertSent(function (Request $request) use ($sku, $seller_id) {
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . '/' . $sku . '?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));

            return true;
        });
    }
}
