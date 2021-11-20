<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Requests\ProductFees\GetMyFeesEstimateRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\ProductFees\GetMyFeesEstimateResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class ProductFeesResource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/products/fees/v0/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getMyFeesEstimateForSku(GetMyFeesEstimateRequest $request, string $seller_sku): GetMyFeesEstimateResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'listings/' . $seller_sku . '/feesEstimate', []);

        return new GetMyFeesEstimateResponse($response);
    }

    public function getMyFeesEstimateForAsin(GetMyFeesEstimateRequest $request, string $asin): GetMyFeesEstimateResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'items/' . $asin . '/feesEstimate', []);

        return new GetMyFeesEstimateResponse($response);
    }
}
