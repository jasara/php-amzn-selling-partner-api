<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Responses\ProductTypeDefinitions\ProductTypeDefinitionResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\ProductTypeDefinitions\ProductTypeListResponse;
use Jasara\AmznSPA\Resources\ProductTypeDefinitionsResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ProductTypeDefinitionsResource::class)]
class ProductTypeDefinitionsResourceTest extends UnitTestCase
{
    public function testSearchDefinitionsProductTypes(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('/product-type-definitions/search-definitions-product-types');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->product_type_definitions->searchDefinitionsProductTypes(
            marketplace_ids: ['ATVPDKIKX0DER'],
            keywords: ['test'],
        );

        $this->assertInstanceOf(ProductTypeListResponse::class, $response);
        $this->assertEquals($response->product_types[0]->name, 'BATTERY_CHARGER_OR_TESTER');

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/definitions/2020-09-01/productTypes?marketplaceIds=ATVPDKIKX0DER&keywords=test', urldecode($request->url()));

            return true;
        });
    }

    public function testGetDefinitionsProductType(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('/product-type-definitions/get-definitions-product-type');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->product_type_definitions->getDefinitionsProductType(
            marketplace_ids: ['ATVPDKIKX0DER'],
            product_type: 'LUGGAGE',
            product_type_version: 'LATEST',
            requirements: 'LISTING',
            requirements_enforced: 'NOT_ENFORCED',
            locale: 'en',
        );

        $this->assertInstanceOf(ProductTypeDefinitionResponse::class, $response);
        $this->assertStringContainsString('https://selling-partner-definitions-prod-iad.s3.amazonaws.com/schema/LUGGAGE.json', $response->schema->link->resource);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/definitions/2020-09-01/productTypes/LUGGAGE?marketplaceIds=ATVPDKIKX0DER&productTypeVersion=LATEST&requirements=LISTING&requirementsEnforced=NOT_ENFORCED&locale=en', urldecode($request->url()));

            return true;
        });
    }
}
