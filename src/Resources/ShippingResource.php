<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Requests\Shipping\CreateShipmentRequest;
use Jasara\AmznSPA\Data\Requests\Shipping\GetRatesRequest;
use Jasara\AmznSPA\Data\Requests\Shipping\PurchaseLabelsRequest;
use Jasara\AmznSPA\Data\Requests\Shipping\PurchaseShipmentRequest;
use Jasara\AmznSPA\Data\Requests\Shipping\RetrieveShippingLabelRequest;
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

    public function createShipment(CreateShipmentRequest $request): CreateShipmentResponse
    {
        $response = $this->http->post($this->endpoint.self::BASE_PATH.'shipments', (array) $request->toArrayObject());

        return new CreateShipmentResponse($response);
    }

    public function getShipment(string $shipment_id): GetShipmentResponse
    {
        $response = $this->http->get($this->endpoint.self::BASE_PATH.'shipments/'.$shipment_id);

        return new GetShipmentResponse($response);
    }

    public function cancelShipment(string $shipment_id): CancelShipmentResponse
    {
        $response = $this->http->post($this->endpoint.self::BASE_PATH.'shipments/'.$shipment_id.'/cancel', []);

        return new CancelShipmentResponse($response);
    }

    public function purchaseLabels(string $shipment_id, PurchaseLabelsRequest $request): PurchaseLabelsResponse
    {
        $response = $this->http->post($this->endpoint.self::BASE_PATH.'shipments/'.$shipment_id.'/purchaseLabels', (array) $request->toArrayObject());

        return new PurchaseLabelsResponse($response);
    }

    public function retrieveShippingLabel(string $shipment_id, string $tracking_id, RetrieveShippingLabelRequest $request): RetrieveShippingLabelResponse
    {
        $response = $this->http->post($this->endpoint.self::BASE_PATH.'shipments/'.$shipment_id.'/containers/'.$tracking_id.'/label', (array) $request->toArrayObject());

        return new RetrieveShippingLabelResponse($response);
    }

    public function purchaseShipment(PurchaseShipmentRequest $request): PurchaseShipmentResponse
    {
        $response = $this->http->post($this->endpoint.self::BASE_PATH.'purchaseShipment', (array) $request->toArrayObject());

        return new PurchaseShipmentResponse($response);
    }

    public function getRates(GetRatesRequest $request): GetRatesResponse
    {
        $response = $this->http->post($this->endpoint.self::BASE_PATH.'rates', (array) $request->toArrayObject());

        return new GetRatesResponse($response);
    }

    public function getAccount(): GetAccountResponse
    {
        $response = $this->http->get($this->endpoint.self::BASE_PATH.'account');

        return new GetAccountResponse($response);
    }

    public function getTrackingInformation(string $tracking_id): GetTrackingInformationResponse
    {
        $response = $this->http->get($this->endpoint.self::BASE_PATH.'tracking/'.$tracking_id);

        return new GetTrackingInformationResponse($response);
    }
}
