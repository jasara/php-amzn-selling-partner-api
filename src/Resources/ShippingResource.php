<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Requests\Shipping\CreateShipmentRequest;
use Jasara\AmznSPA\Data\Requests\Shipping\GetRatesRequest;
use Jasara\AmznSPA\Data\Requests\Shipping\PurchaseLabelsRequest;
use Jasara\AmznSPA\Data\Requests\Shipping\PurchaseShipmentRequest;
use Jasara\AmznSPA\Data\Requests\Shipping\RetrieveShippingLabelRequest;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\Shipping\CancelShipmentResponse;
use Jasara\AmznSPA\Data\Responses\Shipping\CreateShipmentResponse;
use Jasara\AmznSPA\Data\Responses\Shipping\GetAccountResponse;
use Jasara\AmznSPA\Data\Responses\Shipping\GetRatesResponse;
use Jasara\AmznSPA\Data\Responses\Shipping\GetShipmentResponse;
use Jasara\AmznSPA\Data\Responses\Shipping\GetTrackingInformationResponse;
use Jasara\AmznSPA\Data\Responses\Shipping\PurchaseLabelsResponse;
use Jasara\AmznSPA\Data\Responses\Shipping\PurchaseShipmentResponse;
use Jasara\AmznSPA\Data\Responses\Shipping\RetrieveShippingLabelResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class ShippingResource implements ResourceContract
{
    use ValidatesParameters;
    public const BASE_PATH = '/shipping/v1/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function createShipment(CreateShipmentRequest $request): CreateShipmentResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(CreateShipmentResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'shipments',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    public function getShipment(string $shipment_id): GetShipmentResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetShipmentResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id);

        return $response;
    }

    public function cancelShipment(string $shipment_id): CancelShipmentResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(CancelShipmentResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/cancel', []);

        return $response;
    }

    public function purchaseLabels(string $shipment_id, PurchaseLabelsRequest $request): PurchaseLabelsResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(PurchaseLabelsResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/purchaseLabels',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    public function retrieveShippingLabel(string $shipment_id, string $tracking_id, RetrieveShippingLabelRequest $request): RetrieveShippingLabelResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(RetrieveShippingLabelResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/containers/' . $tracking_id . '/label',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    public function purchaseShipment(PurchaseShipmentRequest $request): PurchaseShipmentResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(PurchaseShipmentResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'purchaseShipment',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    public function getRates(GetRatesRequest $request): GetRatesResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetRatesResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'rates',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    public function getAccount(): GetAccountResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetAccountResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'account');

        return $response;
    }

    public function getTrackingInformation(string $tracking_id): GetTrackingInformationResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetTrackingInformationResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'tracking/' . $tracking_id);

        return $response;
    }
}
