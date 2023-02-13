<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Responses\Notifications\CreateDestinationResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Notifications\CreateSubscriptionResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Notifications\DeleteDestinationResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Notifications\DeleteSubscriptionByIdResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Notifications\GetDestinationResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Notifications\GetDestinationsResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Notifications\GetSubscriptionByIdResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Notifications\GetSubscriptionResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\DestinationResourceSpecificationSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\DestinationSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\ProcessingDirectiveSchema;
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

    public function testDeleteSubscriptionById()
    {
        $subscription_id = Str::random();

        list($config, $http) = $this->setupConfigWithFakeHttp('empty');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->notifications->deleteSubscriptionById('ANY_OFFER_CHANGED', $subscription_id);

        $this->assertInstanceOf(DeleteSubscriptionByIdResponse::class, $response);

        $http->assertSent(function (Request $request) use ($subscription_id) {
            $this->assertEquals('DELETE', $request->method());
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
        $response = $amzn->notifications->createSubscription(
            notification_type: 'ANY_OFFER_CHANGED',
            payload_version: $payload_version,
            processing_directive: new ProcessingDirectiveSchema([
                'event_filter' => [
                    'aggregation_settings' => [
                        'aggregation_time_period' => 'FiveMinutes',
                    ],
                    'event_filter_type' => 'ANY_OFFER_CHANGED',
                ],
            ]),
        );

        $this->assertInstanceOf(CreateSubscriptionResponse::class, $response);
        $this->assertEquals('7fcacc7e-727b-11e9-8848-1681be663d3e', $response->payload->subscription_id);

        $http->assertSent(function (Request $request) use ($payload_version) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/notifications/v1/subscriptions/ANY_OFFER_CHANGED', $request->url());
            $this->assertEquals($payload_version, $request->data()['payloadVersion']);
            $this->assertEquals('FiveMinutes', $request->data()['processingDirective']['event_filter']['aggregation_settings']['aggregation_time_period']);

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

    public function testGetDestination()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('notifications/create-destination');

        $destination_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->notifications->getDestination($destination_id);

        $this->assertInstanceOf(GetDestinationResponse::class, $response);
        $this->assertInstanceOf(DestinationSchema::class, $response->payload);

        /** @var DestinationSchema $destination */
        $destination = $response->payload;
        $this->assertEquals('TEST_CASE_200_DESTINATION_ID', $destination->destination_id);
        $this->assertEquals('SQSDestination', $destination->name);
        $this->assertEquals('arn:aws:sqs:us-east-2:444455556666:queue1', $destination->resource->sqs->arn);

        $http->assertSent(function (Request $request) use ($destination_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/notifications/v1/destinations/' . $destination_id, $request->url());

            return true;
        });
    }

    public function testCreateDestination()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('notifications/create-destination');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->notifications->createDestination(Str::random(), new DestinationResourceSpecificationSchema());

        $this->assertInstanceOf(CreateDestinationResponse::class, $response);
        $this->assertInstanceOf(DestinationSchema::class, $response->payload);

        $destination = $response->payload;
        $this->assertEquals('TEST_CASE_200_DESTINATION_ID', $destination->destination_id);
        $this->assertEquals('SQSDestination', $destination->name);
        $this->assertEquals('arn:aws:sqs:us-east-2:444455556666:queue1', $destination->resource->sqs->arn);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/notifications/v1/destinations', $request->url());

            return true;
        });
    }

    public function testDeleteDestination()
    {
        $destination_id = Str::random();

        list($config, $http) = $this->setupConfigWithFakeHttp('empty');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->notifications->deleteDestination($destination_id);

        $this->assertInstanceOf(DeleteDestinationResponse::class, $response);

        $http->assertSent(function (Request $request) use ($destination_id) {
            $this->assertEquals('DELETE', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/notifications/v1/destinations/' . $destination_id, $request->url());

            return true;
        });
    }
}
