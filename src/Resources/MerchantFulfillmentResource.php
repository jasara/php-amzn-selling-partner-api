<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Requests\MerchantFulfillment\CreateShipmentRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\MerchantFulfillment\GetAdditionalSellerInputsRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\MerchantFulfillment\GetEligibleShipmentServicesRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment\CancelShipmentResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment\CreateShipmentResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment\GetAdditionalSellerInputsResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment\GetEligibleShipmentServicesResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment\GetShipmentResponse;
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

    public function getEligibleShipmentServicesOld(GetEligibleShipmentServicesRequest $request): GetEligibleShipmentServicesResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'eligibleServices', (array) $request->toArrayObject());

        return new GetEligibleShipmentServicesResponse($response);
    }

    public function getEligibleShipmentServices(GetEligibleShipmentServicesRequest $request): GetEligibleShipmentServicesResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'eligibleShippingServices', (array) $request->toArrayObject());

        return new GetEligibleShipmentServicesResponse($response);
    }

    public function getShipment(string $shipment_id): GetShipmentResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id);

        return new GetShipmentResponse($response);
    }

    public function cancelShipment(string $shipment_id): CancelShipmentResponse
    {
        $response = $this->http->delete($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id);

        return new CancelShipmentResponse($response);
    }

    public function cancelShipmentOld(string $shipment_id): CancelShipmentResponse
    {
        $response = $this->http->put($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/cancel', []);

        return new CancelShipmentResponse($response);
    }

    public function createShipment(CreateShipmentRequest $request): CreateShipmentResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'shipments/', (array) $request->toArrayObject());

        return new CreateShipmentResponse($response);
    }

    public function getAdditionalSellerInputsOld(GetAdditionalSellerInputsRequest $request): GetAdditionalSellerInputsResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'sellerInputs', (array) $request->toArrayObject());

        return new GetAdditionalSellerInputsResponse($response);
    }

    public function getAdditionalSellerInputs(GetAdditionalSellerInputsRequest $request): GetAdditionalSellerInputsResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'additionalSellerInputs', (array) $request->toArrayObject());

        return new GetAdditionalSellerInputsResponse($response);
    }
}
