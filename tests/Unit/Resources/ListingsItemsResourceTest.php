<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Requests\ListingsItems\ListingsItemPatchRequest;
use Jasara\AmznSPA\Data\Requests\ListingsItems\ListingsItemPutRequest;
use Jasara\AmznSPA\Data\Responses\ListingsItems\GetListingsItemResponse;
use Jasara\AmznSPA\Data\Responses\ListingsItems\ListingsItemSubmissionResponse;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\AttributePropertyListSchema;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\AttributePropertySchema;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\AttributeSchema;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\AttributesListSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Jasara\AmznSPA\Resources\ListingsItemsResource::class)]
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

        $request = ListingsItemPutRequest::from(
            product_type: $product_type = Str::random(),
            requirements: 'LISTING',
            attributes: new AttributesListSchema([
                new AttributeSchema(
                    name: 'bullet_point',
                    properties: AttributePropertyListSchema::make([
                        AttributePropertySchema::from(
                            name: 'value',
                            value: 'test',
                        ),
                        AttributePropertySchema::from(
                            name: 'marketplace_id',
                            value: 'ATVPDKIKX0DER',
                        ),
                    ]),
                ),
                new AttributeSchema(
                    name: 'bullet_point',
                    properties: AttributePropertyListSchema::make([
                        AttributePropertySchema::from(
                            name: 'value',
                            value: 'test_2',
                        ),
                        AttributePropertySchema::from(
                            name: 'marketplace_id',
                            value: 'ATVPDKIKX0DER',
                        ),
                    ]),
                ),
                new AttributeSchema(
                    name: 'externally_assigned_product_identifier',
                    properties: AttributePropertyListSchema::make([
                        AttributePropertySchema::from(
                            name: 'value',
                            value: '123456789',
                        ),
                        AttributePropertySchema::from(
                            name: 'type',
                            value: 'ean',
                        ),
                    ]),
                ),
                new AttributeSchema(
                    name: 'item_package_dimensions',
                    properties: AttributePropertyListSchema::make([
                        AttributePropertySchema::from(
                            name: 'length',
                            properties: AttributePropertyListSchema::make([
                                AttributePropertySchema::from(
                                    name: 'value',
                                    value: '10',
                                ),
                                AttributePropertySchema::from(
                                    name: 'unit',
                                    value: 'inches',
                                ),
                            ]),
                        ),
                    ]),
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
            $this->assertEquals('{"productType":"' . $product_type . '","requirements":"LISTING","attributes":{"bullet_point":[{"value":"test","marketplace_id":"ATVPDKIKX0DER"},{"value":"test_2","marketplace_id":"ATVPDKIKX0DER"}],"externally_assigned_product_identifier":[{"value":"123456789","type":"ean"}],"item_package_dimensions":[{"length":{"value":"10","unit":"inches"}}]}}', $request->body());

            return true;
        });
    }

    public function testDeleteListingsItem()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('listings-items/put-listings-item');

        $request = new ListingsItemPutRequest(
            product_type: Str::random(),
            requirements: 'LISTING',
            attributes: AttributesListSchema::make(),
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

        $request = ListingsItemPatchRequest::from(
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
            $this->assertEquals('PATCH', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . '/' . $sku . '?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));

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
