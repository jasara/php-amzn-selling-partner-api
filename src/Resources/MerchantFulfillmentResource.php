<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Requests\MerchantFulfillment\CreateShipmentRequest;
use Jasara\AmznSPA\Data\Requests\MerchantFulfillment\GetAdditionalSellerInputsRequest;
use Jasara\AmznSPA\Data\Requests\MerchantFulfillment\GetEligibleShipmentServicesRequest;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\MerchantFulfillment\CancelShipmentResponse;
use Jasara\AmznSPA\Data\Responses\MerchantFulfillment\CreateShipmentResponse;
use Jasara\AmznSPA\Data\Responses\MerchantFulfillment\GetAdditionalSellerInputsResponse;
use Jasara\AmznSPA\Data\Responses\MerchantFulfillment\GetEligibleShipmentServicesResponse;
use Jasara\AmznSPA\Data\Responses\MerchantFulfillment\GetShipmentResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class MerchantFulfillmentResource implements ResourceContract
{
    use ValidatesParameters;
    public const BASE_PATH = '/mfn/v0/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getEligibleShipmentServicesOld(GetEligibleShipmentServicesRequest $request): GetEligibleShipmentServicesResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetEligibleShipmentServicesResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'eligibleServices',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    public function getEligibleShipmentServices(GetEligibleShipmentServicesRequest $request): GetEligibleShipmentServicesResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetEligibleShipmentServicesResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'eligibleShippingServices',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    public function getShipment(string $shipment_id): GetShipmentResponse|ErrorListResponse
    {
        $this->http->useRestrictedDataToken();

        $response = $this->http
            ->responseClass(GetShipmentResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id);

        return $response;
    }

    public function cancelShipment(string $shipment_id): CancelShipmentResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(CancelShipmentResponse::class)
            ->delete($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id);

        return $response;
    }

    public function cancelShipmentOld(string $shipment_id): CancelShipmentResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(CancelShipmentResponse::class)
            ->put($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/cancel', []);

        return $response;
    }

    public function createShipment(CreateShipmentRequest $request): CreateShipmentResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(CreateShipmentResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'shipments/',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    public function getAdditionalSellerInputsOld(GetAdditionalSellerInputsRequest $request): GetAdditionalSellerInputsResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetAdditionalSellerInputsResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'sellerInputs',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    public function getAdditionalSellerInputs(GetAdditionalSellerInputsRequest $request): GetAdditionalSellerInputsResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetAdditionalSellerInputsResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'additionalSellerInputs',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }
}
