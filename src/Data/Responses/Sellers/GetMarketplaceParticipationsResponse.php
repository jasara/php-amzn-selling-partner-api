<?php

namespace Jasara\AmznSPA\Data\Responses\Sellers;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Sellers\MarketplaceParticipationSchemaList;

class GetMarketplaceParticipationsResponse extends BaseResponse
{
    public function __construct(
        public ?MarketplaceParticipationSchemaList $payload,
    ) {
    }
}
