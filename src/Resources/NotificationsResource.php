<?php

namespace Jasara\AmznSPA\Resources;

use Illuminate\Http\Client\Factory;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DTOs\ApplicationKeysDTO;
use Jasara\AmznSPA\DTOs\AuthTokensDTO;
use Jasara\AmznSPA\DTOs\Responses\Notifications\GetSubscriptionResponse;
use Jasara\AmznSPA\Traits\CallsAmazon;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class NotificationsResource implements ResourceContract
{
    use ValidatesParameters, CallsAmazon;

    private $base_path = '/notifications/v1/subscriptions';

    public function __construct(
        private Factory $http,
        private AuthTokensDTO $tokens,
        private Marketplace $marketplace,
        private ApplicationKeysDTO $application_keys,
    ) {
    }

    public function getSubscription(string $notification_type)
    {
        $this->validateStringEnum($notification_type, AmazonEnums::notificationTypes());

        $http = $this->setupHttp($this->http, $this->marketplace, $this->tokens, $this->application_keys);

        $response = $http->get($this->marketplace->getBaseUrl() . $this->base_path . '/' . $notification_type);

        return new GetSubscriptionResponse($response->json());
    }
}
