<?php

namespace Jasara\AmznSPA\Resources;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentOutbound\GetFulfillmentPreviewRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\GetFulfillmentPreviewResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class FulfillmentOutboundResource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/fba/outbound/2020-07-01/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getFulfillmentPreview(GetFulfillmentPreviewRequest $request): GetFulfillmentPreviewResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'fulfillmentOrders/preview', (array) $request->toArrayObject());

        return new GetFulfillmentPreviewResponse($response);
    }

    // public function listAllFulfillmentOrders(?CarbonImmutable $query_start_date = null, ?string $next_token = null): ListAllFulfillmentOrdersResponse
    // {
    //     $response = $this->http->get($this->endpoint . self::BASE_PATH . 'fulfillmentOrders', [
    //         'queryStartDate'=> $query_start_date->toDateString(),
    //         'nextToken'=>$next_token,
    //     ]);

    //     return new ListAllFulfillmentOrdersResponse($response);
    // }
}
