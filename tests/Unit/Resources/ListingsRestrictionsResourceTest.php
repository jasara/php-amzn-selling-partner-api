<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\ListingsRestrictions\GetListingsRestrictionsResponse;
use Jasara\AmznSPA\Resources\ListingsRestrictionsResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ListingsRestrictionsResource::class)]
class ListingsRestrictionsResourceTest extends UnitTestCase
{
    public function test_get_listings_restrictions(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('listings-restrictions/get-listings-restrictions');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->listings_restrictions->getListingsRestrictions(
            asin: 'asinValue',
            seller_id: 'sellerIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            condition_type: 'conditionTypeValue',
            reason_locale: 'reasonLocaleValue',
        );

        $this->assertInstanceOf(GetListingsRestrictionsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/listings/2021-08-01/restrictions?asin=asinValue&sellerId=sellerIdValue&marketplaceIds=ATVPDKIKX0DER&conditionType=conditionTypeValue&reasonLocale=reasonLocaleValue', urldecode($request->url()));

            return true;
        });
    }
}
