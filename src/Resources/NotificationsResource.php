<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\Notifications\CreateDestinationResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\CreateSubscriptionResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\DeleteDestinationResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\DeleteSubscriptionByIdResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\GetDestinationResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\GetDestinationsResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\GetSubscriptionByIdResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\GetSubscriptionResponse;
use Jasara\AmznSPA\Data\Schemas\Notifications\DestinationResourceSpecificationSchema;
use Jasara\AmznSPA\Data\Schemas\Notifications\ProcessingDirectiveSchema;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class NotificationsResource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/notifications/v1/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getSubscription(string $notification_type): GetSubscriptionResponse
    {
        $this->validateStringEnum($notification_type, AmazonEnums::NOTIFICATION_TYPES);

        $response = $this->http->get($this->endpoint.self::BASE_PATH.'subscriptions/'.$notification_type);

        return new GetSubscriptionResponse($response);
    }

    public function createSubscription(
        string $notification_type,
        ?string $payload_version = null,
        ?string $destination_id = null,
        ?ProcessingDirectiveSchema $processing_directive = null,
    ): CreateSubscriptionResponse {
        $this->validateStringEnum($notification_type, AmazonEnums::NOTIFICATION_TYPES);

        $response = $this->http->post(
            $this->endpoint.self::BASE_PATH.'subscriptions/'.$notification_type,
            array_filter([
                'payloadVersion' => $payload_version,
                'destinationId' => $destination_id,
                'processingDirective' => $processing_directive?->toArray(),
            ]),
        );

        return new CreateSubscriptionResponse($response);
    }

    public function getSubscriptionById(string $notification_type, string $subscription_id): GetSubscriptionByIdResponse
    {
        $this->validateStringEnum($notification_type, AmazonEnums::NOTIFICATION_TYPES);

        $response = $this->http->getGrantless($this->endpoint.self::BASE_PATH.'subscriptions/'.$notification_type.'/'.$subscription_id);

        return new GetSubscriptionByIdResponse($response);
    }

    public function deleteSubscriptionById(string $notification_type, string $subscription_id): DeleteSubscriptionByIdResponse
    {
        $this->validateStringEnum($notification_type, AmazonEnums::NOTIFICATION_TYPES);

        $response = $this->http->deleteGrantless($this->endpoint.self::BASE_PATH.'subscriptions/'.$notification_type.'/'.$subscription_id);

        return new DeleteSubscriptionByIdResponse($response);
    }

    public function getDestinations(): GetDestinationsResponse
    {
        $response = $this->http->getGrantless($this->endpoint.self::BASE_PATH.'destinations');

        return new GetDestinationsResponse($response);
    }

    public function createDestination(string $name, DestinationResourceSpecificationSchema $resource_specification): CreateDestinationResponse
    {
        $response = $this->http->postGrantless($this->endpoint.self::BASE_PATH.'destinations', [
            'name' => $name,
            'resourceSpecification' => $resource_specification->toArrayObject(),
        ]);

        return new CreateDestinationResponse($response);
    }

    public function getDestination(string $destination_id): GetDestinationResponse
    {
        $response = $this->http->getGrantless($this->endpoint.self::BASE_PATH.'destinations/'.$destination_id);

        return new GetDestinationResponse($response);
    }

    public function deleteDestination(string $destination_id): DeleteDestinationResponse
    {
        $response = $this->http->deleteGrantless($this->endpoint.self::BASE_PATH.'destinations/'.$destination_id);

        return new DeleteDestinationResponse($response);
    }
}
