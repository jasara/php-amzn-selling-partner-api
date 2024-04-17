<?php

namespace Jasara\AmznSPA\Data\Responses\Sellers;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Sellers\MarketplaceParticipationListSchema;

class GetMarketplaceParticipationsResponse extends BaseResponse
{
    public function __construct(
        public ?MarketplaceParticipationListSchema $payload,
    ) {
    }
}
