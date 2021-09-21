<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DTOs\Responses\Notifications\CreateSubscriptionResponse;
use Jasara\AmznSPA\DTOs\Responses\Notifications\GetDestinationsResponse;
use Jasara\AmznSPA\DTOs\Responses\Notifications\GetSubscriptionByIdResponse;
use Jasara\AmznSPA\DTOs\Responses\Notifications\GetSubscriptionResponse;
use Jasara\AmznSPA\DTOs\Schemas\DestinationSchema;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Resources\NotificationsResource
 */
class NotificationsResourceTest extends UnitTestCase
{
    public function testGetSubscription()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('notifications/get-subscription');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->notifications->getSubscription('ANY_OFFER_CHANGED');

        $this->assertInstanceOf(GetSubscriptionResponse::class, $response);
        $this->assertEquals('7fcacc7e-727b-11e9-8848-1681be663d3e', $response->payload->subscription_id);

        $http->assertSent(function (Request $request) use ($config) {
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/notifications/v1/subscriptions/ANY_OFFER_CHANGED', $request->url());

            return true;
        });
    }

    public function testGetSubscriptionById()
    {
        $subscription_id = Str::random();

        list($config, $http) = $this->setupConfigWithFakeHttp('notifications/get-subscription');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->notifications->getSubscriptionById('ANY_OFFER_CHANGED', $subscription_id);

        $this->assertInstanceOf(GetSubscriptionByIdResponse::class, $response);
        $this->assertEquals('7fcacc7e-727b-11e9-8848-1681be663d3e', $response->payload->subscription_id);

        $http->assertSent(function (Request $request) use ($subscription_id) {
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/notifications/v1/subscriptions/ANY_OFFER_CHANGED/' . $subscription_id, $request->url());

            return true;
        });
    }

    public function testCreateSubscription()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('notifications/create-subscription');
        $payload_version = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->notifications->createSubscription('ANY_OFFER_CHANGED', $payload_version);

        $this->assertInstanceOf(CreateSubscriptionResponse::class, $response);
        $this->assertEquals('7fcacc7e-727b-11e9-8848-1681be663d3e', $response->payload->subscription_id);

        $http->assertSent(function (Request $request) use ($payload_version) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/notifications/v1/subscriptions/ANY_OFFER_CHANGED', $request->url());
            $this->assertEquals($payload_version, $request->data()['body']['payloadVersion']);

            return true;
        });
    }

    public function testGetDestinations()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('notifications/get-destinations');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->notifications->getDestinations();

        $this->assertInstanceOf(GetDestinationsResponse::class, $response);
        $this->assertCount(1, $response->payload);
        $this->assertInstanceOf(DestinationSchema::class, $response->payload->first());

        /** @var DestinationSchema $destination */
        $destination = $response->payload->first();
        $this->assertEquals('TEST_CASE_200', $destination->destination_id);
        $this->assertEquals('SQSDestination', $destination->name);
        $this->assertEquals('arn:aws:sqs:us-east-2:444455556666:queue1', $destination->resource->sqs->arn);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/notifications/v1/destinations', $request->url());

            return true;
        });
    }
}
