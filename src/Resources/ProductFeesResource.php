<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Requests\ProductFees\GetMyFeesEstimateRequest;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\ProductFees\GetMyFeesEstimateResponse;
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

    public function getMyFeesEstimateForSku(GetMyFeesEstimateRequest $request, string $seller_sku): GetMyFeesEstimateResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetMyFeesEstimateResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'listings/' . $seller_sku . '/feesEstimate',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    public function getMyFeesEstimateForAsin(GetMyFeesEstimateRequest $request, string $asin): GetMyFeesEstimateResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetMyFeesEstimateResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'items/' . $asin . '/feesEstimate',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }
}
