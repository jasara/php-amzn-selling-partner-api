<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\Tracking\GetShipmentTrackingResponse;
use Jasara\AmznSPA\Exceptions\InvalidParametersException;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class TrackingResource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/tracking/2026-01-30/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getShipmentTracking(
        ?string $id = null,
        ?string $acsin = null,
        ?string $aftn = null,
        ?string $container_number = null,
        ?string $house_bill_of_lading_number = null,
        ?string $carrier_tracking_number = null,
        ?string $carrier_code = null,
    ): GetShipmentTrackingResponse|ErrorListResponse {
        $this->validateSingleIdentifier([
            $id,
            $acsin,
            $aftn,
            $container_number,
            $house_bill_of_lading_number,
            $carrier_tracking_number,
        ]);

        $response = $this->http
            ->responseClass(GetShipmentTrackingResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'shipments/track', array_filter([
                'id' => $id,
                'acsin' => $acsin,
                'aftn' => $aftn,
                'containerNumber' => $container_number,
                'houseBillOfLadingNumber' => $house_bill_of_lading_number,
                'carrierTracking.trackingNumber' => $carrier_tracking_number,
                'carrierTracking.carrierCode' => $carrier_code,
            ]));

        return $response;
    }

    private function validateSingleIdentifier(array $identifiers): void
    {
        if (count(array_filter($identifiers)) !== 1) {
            throw new InvalidParametersException('Exactly one tracking identifier must be provided.');
        }
    }
}
