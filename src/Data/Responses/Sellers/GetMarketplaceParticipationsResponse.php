<?php

namespace Jasara\AmznSPA\Data\Responses\Sellers;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Sellers\MarketplaceParticipationListSchema;
use Jasara\AmznSPA\Data\Schemas\Sellers\MarketplaceParticipationSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetMarketplaceParticipationsResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: MarketplaceParticipationSchema::class)]
    public ?MarketplaceParticipationListSchema $payload;
}
