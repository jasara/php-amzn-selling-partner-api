<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Requests\MerchantFulfillment\GetEligibleShipmentServicesRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFullfillment\GetEligibleShipmentServicesResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class MerchantFulFillmentResource implements ResourceContract
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
}
