<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\Sellers\GetMarketplaceParticipationsResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class SellersResource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/sellers/v1/marketplaceParticipations';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getMarketplaceParticipations(): GetMarketplaceParticipationsResponse
    {
        $response = $this->http->get($this->endpoint.self::BASE_PATH);

        return new GetMarketplaceParticipationsResponse($response);
    }
}
