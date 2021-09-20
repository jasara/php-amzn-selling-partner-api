<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DTOs\Responses\Notifications\CreateSubscriptionResponse;
use Jasara\AmznSPA\DTOs\Responses\Notifications\GetSubscriptionResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @coversDefaultClass \Jasara\AmznSPA\Resources\NotificationsResource
 */
class NotificationsResourceTest extends UnitTestCase
{
    /**
     * @covers ::__construct()
     * @covers ::getSubscription()
     */
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
}
