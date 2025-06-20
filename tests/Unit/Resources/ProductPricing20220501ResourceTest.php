<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Requests\ProductPricing\v20220501\CompetitiveSummaryBatchRequest;
use Jasara\AmznSPA\Data\Requests\ProductPricing\v20220501\CompetitiveSummaryRequest;
use Jasara\AmznSPA\Data\Requests\ProductPricing\v20220501\CompetitiveSummaryRequestList;
use Jasara\AmznSPA\Data\Requests\ProductPricing\v20220501\FeaturedOfferExpectedPriceRequest;
use Jasara\AmznSPA\Data\Requests\ProductPricing\v20220501\FeaturedOfferExpectedPriceRequestList;
use Jasara\AmznSPA\Data\Requests\ProductPricing\v20220501\GetFeaturedOfferExpectedPriceBatchRequest;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501\CompetitiveSummaryIncludedDataList;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501\HttpMethod;
use Jasara\AmznSPA\Data\Responses\ProductPricing\v20220501\CompetitiveSummaryBatchResponse;
use Jasara\AmznSPA\Data\Responses\ProductPricing\v20220501\GetFeaturedOfferExpectedPriceBatchResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Jasara\AmznSPA\Resources\ProductPricing20220501Resource::class)]
class ProductPricing20220501ResourceTest extends UnitTestCase
{
    public function testGetFeaturedOfferExpectedPriceBatch()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('product-pricing/v20220501/get-featured-offer-expected-price-batch');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');

        $featuredOfferRequest = new FeaturedOfferExpectedPriceRequest(
            marketplace_id: 'MARKETPLACE_ID',
            sku: 'MY_SKU',
            uri: '/test',
            method: HttpMethod::from('POST')
        );

        $requestList = new FeaturedOfferExpectedPriceRequestList($featuredOfferRequest);
        $request = new GetFeaturedOfferExpectedPriceBatchRequest($requestList);

        $response = $amzn->product_pricing_20220501->getFeaturedOfferExpectedPriceBatch($request);

        $this->assertInstanceOf(GetFeaturedOfferExpectedPriceBatchResponse::class, $response);

        $responseData = $response->responses->first();
        $this->assertEquals(200, $responseData->status->status_code);
        $this->assertEquals('Success', $responseData->status->reason_phrase);
        $this->assertEquals('ASIN', $responseData->body->offer_identifier->asin);
        $this->assertEquals('MY_SKU', $responseData->body->offer_identifier->sku);
        $this->assertEquals(10.00, $responseData->body->featured_offer_expected_price_results->first()->featured_offer_expected_price->listing_price->amount);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/batches/products/pricing/2022-05-01/offer/featuredOfferExpectedPrice', $request->url());

            return true;
        });
    }

    public function testGetCompetitiveSummary()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('product-pricing/v20220501/get-competitive-summary');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');

        $includedData = new CompetitiveSummaryIncludedDataList([]);
        
        $competitiveSummaryRequest = new CompetitiveSummaryRequest(
            asin: 'B00ZIAODGE',
            marketplace_id: 'ATVPDKIKX0DER',
            included_data: $includedData,
            method: HttpMethod::from('POST'),
            uri: '/test'
        );

        $requestList = new CompetitiveSummaryRequestList($competitiveSummaryRequest);
        $request = new CompetitiveSummaryBatchRequest($requestList);

        $response = $amzn->product_pricing_20220501->getCompetitiveSummary($request);

        $this->assertInstanceOf(CompetitiveSummaryBatchResponse::class, $response);

        $responseData = $response->responses->first();
        $this->assertEquals(200, $responseData->status->status_code);
        $this->assertEquals('Success', $responseData->status->reason_phrase);
        $this->assertEquals('B00ZIAODGE', $responseData->body->asin);
        $this->assertEquals('ATVPDKIKX0DER', $responseData->body->marketplace_id);
        $this->assertEquals('New', $responseData->body->featured_buying_options->first()->buying_option_type->value);
        $this->assertEquals(18.11, $responseData->body->featured_buying_options->first()->segmented_featured_offers->first()->listing_price->amount);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/batches/products/pricing/2022-05-01/items/competitiveSummary', $request->url());

            return true;
        });
    }
}