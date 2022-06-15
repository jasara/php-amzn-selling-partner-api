<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Requests\Feeds\CreateFeedDocumentSpecification;
use Jasara\AmznSPA\DataTransferObjects\Requests\Feeds\CreateFeedSpecification;
use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Feeds\CreateFeedDocumentResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Feeds\CreateFeedResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Feeds\GetFeedDocumentResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Feeds\GetFeedResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Feeds\GetFeedsResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Resources\FeedsResource
 */
class FeedsResourceTest extends UnitTestCase
{
    public function testGetFeeds()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('feeds/get-feeds');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->feeds->getFeeds(['POST_PRODUCT_DATA'], ['ATVPDKIKX0DER'], 10, ['DONE']);

        $this->assertInstanceOf(GetFeedsResponse::class, $response);
        $this->assertEquals('FeedId1', $response->feeds->first()->feed_id);

        $http->assertSent(function (Request $request) use ($config) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/feeds/2021-06-30/feeds?feedTypes=POST_PRODUCT_DATA&marketplaceIds=ATVPDKIKX0DER&pageSize=10&processingStatuses=DONE', $request->url());

            return true;
        });
    }

    public function testCreateFeed()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('feeds/create-feed');

        $request = new CreateFeedSpecification(
            feed_type: 'POST_PRODUCT_DATA',
            marketplace_ids: ['ATVPDKIKX0DER'],
            input_feed_document_id: Str::random(),
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->feeds->createFeed($request);

        $this->assertInstanceOf(CreateFeedResponse::class, $response);
        $this->assertEquals('3485934', $response->feed_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/feeds/2021-06-30/feeds', $request->url());

            return true;
        });
    }

    public function testCreateFeedReturnsError()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('errors/invalid-request-parameters');

        $request = new CreateFeedSpecification(
            feed_type: 'POST_PRODUCT_DATA',
            marketplace_ids: ['ATVPDKIKX0DER'],
            input_feed_document_id: Str::random(),
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->feeds->createFeed($request);

        $this->assertInstanceOf(CreateFeedResponse::class, $response);
        $this->assertNull($response->feed_id);
        $this->assertEquals($response->errors[0]->message, 'Invalid request parameters');
    }

    public function testGetFeed()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('feeds/get-feed');

        $feed_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->feeds->getFeed($feed_id);

        $this->assertInstanceOf(GetFeedResponse::class, $response);
        $this->assertEquals('FeedId1', $response->feed->feed_id);
        $this->assertEquals('POST_PRODUCT_DATA', $response->feed->feed_type);

        $http->assertSent(function (Request $request) use ($feed_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/feeds/2021-06-30/feeds/' . $feed_id, $request->url());

            return true;
        });
    }

    public function testCancelFeed()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('feeds/cancel-feed');

        $feed_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->feeds->cancelFeed($feed_id);

        $this->assertInstanceOf(BaseResponse::class, $response);

        $http->assertSent(function (Request $request) use ($feed_id) {
            $this->assertEquals('DELETE', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/feeds/2021-06-30/feeds/' . $feed_id, $request->url());

            return true;
        });
    }

    public function testCreateFeedDocument()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('feeds/create-feed-document');

        $request = new CreateFeedDocumentSpecification(
            content_type: 'text/xml; charset=UTF-8',
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->feeds->createFeedDocument($request);

        $this->assertInstanceOf(CreateFeedDocumentResponse::class, $response);
        $this->assertEquals('3d4e42b5-1d6e-44e8-a89c-2abfca0625bb', $response->feed_document_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/feeds/2021-06-30/documents', $request->url());

            return true;
        });
    }

    public function testGetFeedDocument()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('feeds/get-feed-document');

        $feed_document_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->feeds->getFeedDocument($feed_document_id);

        $this->assertInstanceOf(GetFeedDocumentResponse::class, $response);
        $this->assertEquals('https://d34o8swod1owfl.cloudfront.net/Feed_101__POST_PRODUCT_DATA_.xml', $response->feed_document->url);

        $http->assertSent(function (Request $request) use ($feed_document_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/feeds/2021-06-30/documents/' . $feed_document_id, $request->url());

            return true;
        });
    }
}
