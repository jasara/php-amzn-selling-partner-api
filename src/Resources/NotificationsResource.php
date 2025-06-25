<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\CreateDestinationResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\CreateSubscriptionResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\DeleteDestinationResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\DeleteSubscriptionByIdResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\GetDestinationResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\GetDestinationsResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\GetSubscriptionByIdResponse;
use Jasara\AmznSPA\Data\Responses\Notifications\GetSubscriptionResponse;
use Jasara\AmznSPA\Data\Schemas\Notifications\DestinationResourceSpecificationSchema;
use Jasara\AmznSPA\Data\Schemas\Notifications\NotificationType;
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

    public function getSubscription(string $notification_type): GetSubscriptionResponse|ErrorListResponse
    {
        $this->validateStringEnum($notification_type, NotificationType::getValues());

        $response = $this->http
            ->responseClass(GetSubscriptionResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'subscriptions/' . $notification_type);

        return $response;
    }

    public function createSubscription(
        string $notification_type,
        ?string $payload_version = null,
        ?string $destination_id = null,
        ?ProcessingDirectiveSchema $processing_directive = null,
    ): CreateSubscriptionResponse|ErrorListResponse {
        $this->validateStringEnum($notification_type, NotificationType::getValues());

        $response = $this->http
            ->responseClass(CreateSubscriptionResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'subscriptions/' . $notification_type,
                array_filter([
                    'payloadVersion' => $payload_version,
                    'destinationId' => $destination_id,
                    'processingDirective' => $processing_directive?->toArrayObject(),
                ]),
            );

        return $response;
    }

    public function getSubscriptionById(string $notification_type, string $subscription_id): GetSubscriptionByIdResponse|ErrorListResponse
    {
        $this->validateStringEnum($notification_type, NotificationType::getValues());

        $response = $this->http
            ->responseClass(GetSubscriptionByIdResponse::class)
            ->getGrantless($this->endpoint . self::BASE_PATH . 'subscriptions/' . $notification_type . '/' . $subscription_id);

        return $response;
    }

    public function deleteSubscriptionById(string $notification_type, string $subscription_id): DeleteSubscriptionByIdResponse|ErrorListResponse
    {
        $this->validateStringEnum($notification_type, NotificationType::getValues());

        $response = $this->http
            ->responseClass(DeleteSubscriptionByIdResponse::class)
            ->deleteGrantless($this->endpoint . self::BASE_PATH . 'subscriptions/' . $notification_type . '/' . $subscription_id);

        return $response;
    }

    public function getDestinations(): GetDestinationsResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetDestinationsResponse::class)
            ->getGrantless($this->endpoint . self::BASE_PATH . 'destinations');

        return $response;
    }

    public function createDestination(string $name, DestinationResourceSpecificationSchema $resource_specification): CreateDestinationResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(CreateDestinationResponse::class)
            ->postGrantless($this->endpoint . self::BASE_PATH . 'destinations', [
                'name' => $name,
                'resourceSpecification' => $resource_specification->toArrayObject(),
            ]);

        return $response;
    }

    public function getDestination(string $destination_id): GetDestinationResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetDestinationResponse::class)
            ->getGrantless($this->endpoint . self::BASE_PATH . 'destinations/' . $destination_id);

        return $response;
    }

    public function deleteDestination(string $destination_id): DeleteDestinationResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(DeleteDestinationResponse::class)
            ->deleteGrantless($this->endpoint . self::BASE_PATH . 'destinations/' . $destination_id);

        return $response;
    }
}
