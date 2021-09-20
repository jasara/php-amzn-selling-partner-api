<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
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

        $http->assertSent(function (Request $request) use ($config) {
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/notifications/v1/subscriptions/ANY_OFFER_CHANGED', $request->url());

            return true;
        });
    }
}
