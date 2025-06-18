<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Requests\ListingsItems\ListingsItemPatchRequest;
use Jasara\AmznSPA\Data\Requests\ListingsItems\ListingsItemPutRequest;
use Jasara\AmznSPA\Data\Responses\ListingsItems\GetListingsItemResponse;
use Jasara\AmznSPA\Data\Responses\ListingsItems\ListingsItemSubmissionResponse;
use Jasara\AmznSPA\Data\Responses\ListingsItems\SearchListingsItemsResponse;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\AttributePropertyListSchema;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\AttributePropertySchema;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\AttributeSchema;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\AttributesListSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\TestWith;

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
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . '/' . $sku . '?marketplaceIds=ATVPDKIKX0DER', $request->url());

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
            $this->assertIsArray($request->data()['patches']);

            return true;
        });
    }

    #[TestWith(['amzn.gr.CW - #4 Brown-5gI2bvgCaM-7Cz8-VG'])]
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

    public function testSearchListingsItems()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('listings-items/search-listings-items');

        $seller_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->listings_items->searchListingsItems(
            seller_id: $seller_id,
            marketplace_ids: ['ATVPDKIKX0DER'],
            included_data: ['summaries', 'offers'],
            identifiers: ['GM-ZDPI-9B4E'],
            identifiers_type: 'SKU',
            page_size: 1,
        );

        $this->assertInstanceOf(SearchListingsItemsResponse::class, $response);
        $this->assertEquals(1, $response->number_of_results);
        $this->assertEquals('GM-ZDPI-9B4E', $response->items[0]->sku);
        $this->assertNotNull($response->pagination);
        $this->assertEquals('xsdflkj324lkjsdlkj3423klkjsdfkljlk2j34klj2l3k4jlksdjl234', $response->pagination->next_token);

        $http->assertSent(function (Request $request) use ($seller_id) {
            $this->assertEquals('GET', $request->method());
            $expectedUrl = 'https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . '?marketplaceIds=ATVPDKIKX0DER&includedData=summaries,offers&identifiers=GM-ZDPI-9B4E&identifiersType=SKU&sortBy=lastUpdatedDate&sortOrder=DESC&pageSize=1';
            $this->assertEquals($expectedUrl, urldecode($request->url()));

            return true;
        });
    }

    public function testSearchListingsItemsWithVariationParentSku()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('listings-items/search-listings-items');

        $seller_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->listings_items->searchListingsItems(
            seller_id: $seller_id,
            marketplace_ids: ['ATVPDKIKX0DER'],
            variation_parent_sku: 'PARENT-SKU-123',
            with_issue_severity: ['ERROR'],
            with_status: ['BUYABLE'],
            without_status: ['DISCOVERABLE'],
            sort_by: 'sku',
            sort_order: 'ASC',
            page_size: 5,
            page_token: 'next-page-token'
        );

        $this->assertInstanceOf(SearchListingsItemsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($seller_id) {
            $this->assertEquals('GET', $request->method());
            $expectedUrl = 'https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . '?marketplaceIds=ATVPDKIKX0DER&variationParentSku=PARENT-SKU-123&withIssueSeverity=ERROR&withStatus=BUYABLE&withoutStatus=DISCOVERABLE&sortBy=sku&sortOrder=ASC&pageSize=5&pageToken=next-page-token';
            $this->assertEquals($expectedUrl, urldecode($request->url()));

            return true;
        });
    }

    public function testSearchListingsItemsWithPackageHierarchySku()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('listings-items/search-listings-items');

        $seller_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->listings_items->searchListingsItems(
            seller_id: $seller_id,
            marketplace_ids: ['ATVPDKIKX0DER'],
            package_hierarchy_sku: 'PACKAGE-SKU-123',
            created_after: '2024-01-01T00:00:00Z',
            created_before: '2024-12-31T23:59:59Z',
            last_updated_after: '2024-06-01T00:00:00Z',
            last_updated_before: '2024-06-30T23:59:59Z'
        );

        $this->assertInstanceOf(SearchListingsItemsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($seller_id) {
            $this->assertEquals('GET', $request->method());
            $expectedUrl = 'https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . '?marketplaceIds=ATVPDKIKX0DER&packageHierarchySku=PACKAGE-SKU-123&createdAfter=2024-01-01T00:00:00Z&createdBefore=2024-12-31T23:59:59Z&lastUpdatedAfter=2024-06-01T00:00:00Z&lastUpdatedBefore=2024-06-30T23:59:59Z&sortBy=lastUpdatedDate&sortOrder=DESC&pageSize=10';
            $this->assertEquals($expectedUrl, urldecode($request->url()));

            return true;
        });
    }

    public function testSearchListingsItemsValidationIdentifiersTooMany()
    {
        [$config] = $this->setupConfigWithFakeHttp('listings-items/search-listings-items');

        $seller_id = Str::random();
        $identifiers = array_fill(0, 21, 'SKU-' . Str::random()); // 21 identifiers (exceeds limit)

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Maximum 20 identifiers allowed');

        $amzn->listings_items->searchListingsItems(
            seller_id: $seller_id,
            marketplace_ids: ['ATVPDKIKX0DER'],
            identifiers: $identifiers,
            identifiers_type: 'SKU'
        );
    }

    public function testSearchListingsItemsValidationIdentifiersWithoutType()
    {
        [$config] = $this->setupConfigWithFakeHttp('listings-items/search-listings-items');

        $seller_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('identifiers_type is required when identifiers is provided');

        $amzn->listings_items->searchListingsItems(
            seller_id: $seller_id,
            marketplace_ids: ['ATVPDKIKX0DER'],
            identifiers: ['SKU-123']
        );
    }

    public function testSearchListingsItemsValidationIdentifiersTypeWithoutIdentifiers()
    {
        [$config] = $this->setupConfigWithFakeHttp('listings-items/search-listings-items');

        $seller_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('identifiers is required when identifiers_type is provided');

        $amzn->listings_items->searchListingsItems(
            seller_id: $seller_id,
            marketplace_ids: ['ATVPDKIKX0DER'],
            identifiers_type: 'SKU'
        );
    }

    public function testSearchListingsItemsValidationVariationParentSkuWithIdentifiers()
    {
        [$config] = $this->setupConfigWithFakeHttp('listings-items/search-listings-items');

        $seller_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('variation_parent_sku cannot be used with identifiers or package_hierarchy_sku');

        $amzn->listings_items->searchListingsItems(
            seller_id: $seller_id,
            marketplace_ids: ['ATVPDKIKX0DER'],
            identifiers: ['SKU-123'],
            identifiers_type: 'SKU',
            variation_parent_sku: 'PARENT-SKU-123'
        );
    }

    public function testSearchListingsItemsValidationVariationParentSkuWithPackageHierarchy()
    {
        [$config] = $this->setupConfigWithFakeHttp('listings-items/search-listings-items');

        $seller_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('variation_parent_sku cannot be used with identifiers or package_hierarchy_sku');

        $amzn->listings_items->searchListingsItems(
            seller_id: $seller_id,
            marketplace_ids: ['ATVPDKIKX0DER'],
            variation_parent_sku: 'PARENT-SKU-123',
            package_hierarchy_sku: 'PACKAGE-SKU-123'
        );
    }

    public function testSearchListingsItemsValidationPackageHierarchySkuWithIdentifiers()
    {
        [$config] = $this->setupConfigWithFakeHttp('listings-items/search-listings-items');

        $seller_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('package_hierarchy_sku cannot be used with identifiers or variation_parent_sku');

        $amzn->listings_items->searchListingsItems(
            seller_id: $seller_id,
            marketplace_ids: ['ATVPDKIKX0DER'],
            identifiers: ['SKU-123'],
            identifiers_type: 'SKU',
            package_hierarchy_sku: 'PACKAGE-SKU-123'
        );
    }

    public function testSearchListingsItemsValidationPageSizeTooSmall()
    {
        [$config] = $this->setupConfigWithFakeHttp('listings-items/search-listings-items');

        $seller_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('page_size must be between 1 and 20');

        $amzn->listings_items->searchListingsItems(
            seller_id: $seller_id,
            marketplace_ids: ['ATVPDKIKX0DER'],
            page_size: 0
        );
    }

    public function testSearchListingsItemsValidationPageSizeTooLarge()
    {
        [$config] = $this->setupConfigWithFakeHttp('listings-items/search-listings-items');

        $seller_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('page_size must be between 1 and 20');

        $amzn->listings_items->searchListingsItems(
            seller_id: $seller_id,
            marketplace_ids: ['ATVPDKIKX0DER'],
            page_size: 21
        );
    }

    public function testSearchListingsItemsWithAllParametersNull()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('listings-items/search-listings-items');

        $seller_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->listings_items->searchListingsItems(
            seller_id: $seller_id,
            marketplace_ids: ['ATVPDKIKX0DER'],
            issue_locale: null,
            included_data: null,
            identifiers: null,
            identifiers_type: null,
            variation_parent_sku: null,
            package_hierarchy_sku: null,
            created_after: null,
            created_before: null,
            last_updated_after: null,
            last_updated_before: null,
            with_issue_severity: null,
            with_status: null,
            without_status: null,
            sort_by: null,
            sort_order: null,
            page_size: null,
            page_token: null
        );

        $this->assertInstanceOf(SearchListingsItemsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($seller_id) {
            $this->assertEquals('GET', $request->method());
            $expectedUrl = 'https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/items/' . $seller_id . '?marketplaceIds=ATVPDKIKX0DER';
            $this->assertEquals($expectedUrl, urldecode($request->url()));

            return true;
        });
    }
}
