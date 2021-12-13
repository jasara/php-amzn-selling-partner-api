<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Sellers;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Sellers\MarketplaceParticipationListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Sellers\MarketplaceParticipationSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetMarketplaceParticipationsResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: MarketplaceParticipationSchema::class)]
    public ?MarketplaceParticipationListSchema $payload;
}
