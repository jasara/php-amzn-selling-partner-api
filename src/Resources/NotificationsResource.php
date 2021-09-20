<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DTOs\Responses\Notifications\CreateSubscriptionResponse;
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

    public function getSubscription(string $notification_type): GetSubscriptionResponse
    {
        $this->validateStringEnum($notification_type, AmazonEnums::notificationTypes());

        $response = $this->http->get($this->endpoint . $this->base_path . '/' . $notification_type);

        return new GetSubscriptionResponse($response->json());
    }

    public function createSubscription(string $notification_type, ?string $payload_version = null, ?string $destination_id = null): CreateSubscriptionResponse
    {
        $this->validateStringEnum($notification_type, AmazonEnums::notificationTypes());

        $response = $this->http->post($this->endpoint . $this->base_path . '/' . $notification_type, [
            'body' => array_filter([
                'payloadVersion' => $payload_version,
                'destinationId' => $destination_id,
            ]),
        ]);

        return new CreateSubscriptionResponse($response->json());
    }
}
