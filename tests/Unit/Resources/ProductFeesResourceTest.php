<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Requests\ProductFees\GetMyFeesEstimateRequest;
use Jasara\AmznSPA\Data\Responses\ProductFees\GetMyFeesEstimateResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Jasara\AmznSPA\Resources\ProductFeesResource::class)]
class ProductFeesResourceTest extends UnitTestCase
{
    public function testGetMyFeesEstimateForSku()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('product-fees/get-my-fees-estimate-for-sku');
        $request = GetMyFeesEstimateRequest::from(
            fees_estimate_request: [
                'marketplace_id' => 'ATVPDKIKX0DER',
                'is_amazon_fulfilled' => false,
                'price_to_estimate_fees' => [
                    'listing_price' => [
                        'currency_code' => 'USD',
                        'amount' => 10,
                    ],
                ],
                'shipping' => [
                    'currency_code' => 'USD',
                    'amount' => 10,
                ],
                'points' => [
                    'points_number' => 0,
                    'points_monetary_value' => [
                        'currency_code' => 'USD',
                        'amount' => 0,
                    ],
                ],
                'identifier' => Str::random(),
            ]
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $seller_sku = Str::random();
        $response = $amzn->product_fees->getMyFeesEstimateForSKU($request, $seller_sku);

        $this->assertInstanceOf(GetMyFeesEstimateResponse::class, $response);

        $http->assertSent(function (Request $request) use ($seller_sku) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/products/fees/v0/listings/' . $seller_sku . '/feesEstimate', urldecode($request->url()));
            ray($request->body());

            return true;
        });
    }

    public function testGetMyFeesEstimateForAsin()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('product-fees/get-my-fees-estimate-for-sku');
        $request = GetMyFeesEstimateRequest::from(
            fees_estimate_request: [
                'marketplace_id' => 'ATVPDKIKX0DER',
                'is_amazon_fulfilled' => false,
                'price_to_estimate_fees' => [
                    'listing_price' => [
                        'currency_code' => 'USD',
                        'amount' => 10,
                    ],
                ],
                'shipping' => [
                    'currency_code' => 'USD',
                    'amount' => 10,
                ],
                'points' => [
                    'points_number' => 0,
                    'points_monetary_value' => [
                        'currency_code' => 'USD',
                        'amount' => 0,
                    ],
                ],
                'identifier' => Str::random(),
            ]
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $asin = Str::random();
        $response = $amzn->product_fees->getMyFeesEstimateForAsin($request, $asin);

        $this->assertInstanceOf(GetMyFeesEstimateResponse::class, $response);

        $http->assertSent(function (Request $request) use ($asin) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/products/fees/v0/items/' . $asin . '/feesEstimate', urldecode($request->url()));

            return true;
        });
    }
}
