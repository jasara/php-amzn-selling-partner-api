<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DTOs\Responses\Notifications\CreateDestinationResponse;
use Jasara\AmznSPA\DTOs\Responses\Notifications\CreateSubscriptionResponse;
use Jasara\AmznSPA\DTOs\Responses\Notifications\DeleteDestinationResponse;
use Jasara\AmznSPA\DTOs\Responses\Notifications\DeleteSubscriptionByIdResponse;
use Jasara\AmznSPA\DTOs\Responses\Notifications\GetDestinationResponse;
use Jasara\AmznSPA\DTOs\Responses\Notifications\GetDestinationsResponse;
use Jasara\AmznSPA\DTOs\Responses\Notifications\GetSubscriptionByIdResponse;
use Jasara\AmznSPA\DTOs\Responses\Notifications\GetSubscriptionResponse;
use Jasara\AmznSPA\DTOs\Schemas\DestinationResourceSpecificationSchema;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class NotificationsResource implements ResourceContract
{
    use ValidatesParameters;

    const BASE_PATH = '/notifications/v1/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getSubscription(string $notification_type): GetSubscriptionResponse
    {
        $this->validateStringEnum($notification_type, AmazonEnums::notificationTypes());

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'subscriptions/' . $notification_type);

        return new GetSubscriptionResponse($response->json());
    }

    public function createSubscription(string $notification_type, ?string $payload_version = null, ?string $destination_id = null): CreateSubscriptionResponse
    {
        $this->validateStringEnum($notification_type, AmazonEnums::notificationTypes());

        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'subscriptions/' . $notification_type, [
            'body' => array_filter([
                'payloadVersion' => $payload_version,
                'destinationId' => $destination_id,
            ]),
        ]);

        return new CreateSubscriptionResponse($response->json());
    }

    public function getSubscriptionById(string $notification_type, string $subscription_id): GetSubscriptionByIdResponse
    {
        $this->validateStringEnum($notification_type, AmazonEnums::notificationTypes());

        $response = $this->http->getGrantless($this->endpoint . self::BASE_PATH . 'subscriptions/' . $notification_type . '/' . $subscription_id);

        return new GetSubscriptionByIdResponse($response->json());
    }

    public function deleteSubscriptionById(string $notification_type, string $subscription_id): DeleteSubscriptionByIdResponse
    {
        $this->validateStringEnum($notification_type, AmazonEnums::notificationTypes());

        $response = $this->http->deleteGrantless($this->endpoint . self::BASE_PATH . 'subscriptions/' . $notification_type . '/' . $subscription_id);

        return new DeleteSubscriptionByIdResponse($response->json());
    }

    public function getDestinations(): GetDestinationsResponse
    {
        $response = $this->http->getGrantless($this->endpoint . self::BASE_PATH . 'destinations');

        return new GetDestinationsResponse($response->json());
    }

    public function createDestination(string $name, DestinationResourceSpecificationSchema $resource_specification): CreateDestinationResponse
    {
        $response = $this->http->postGrantless($this->endpoint . self::BASE_PATH . 'destinations', [
            'name' => $name,
            'resourceSpecification' => $resource_specification->toArrayObject(),
        ]);

        return new CreateDestinationResponse($response->json());
    }

    public function getDestination(string $destination_id): GetDestinationResponse
    {
        $response = $this->http->getGrantless($this->endpoint . self::BASE_PATH . 'destinations/' . $destination_id);

        return new GetDestinationResponse($response->json());
    }

    public function deleteDestination(string $destination_id): DeleteDestinationResponse
    {
        $response = $this->http->deleteGrantless($this->endpoint . self::BASE_PATH . 'destinations/' . $destination_id);

        return new DeleteDestinationResponse($response->json());
    }
}
