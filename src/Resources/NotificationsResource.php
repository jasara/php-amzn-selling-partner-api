<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DTOs\Responses\Notifications\GetSubscriptionResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class NotificationsResource implements ResourceContract
{
    use ValidatesParameters;

    private $base_path = '/notifications/v1/subscriptions';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getSubscription(string $notification_type)
    {
        $this->validateStringEnum($notification_type, AmazonEnums::notificationTypes());

        $response = $this->http->get($this->endpoint . $this->base_path . '/' . $notification_type);

        return new GetSubscriptionResponse($response->json());
    }
}
