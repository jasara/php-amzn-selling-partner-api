<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Sellers;

use Spatie\DataTransferObject\DataTransferObject;

class MarketplaceParticipationSchema extends DataTransferObject
{
    public MarketplaceSchema $marketplace;

    public ParticipationSchema $participation;
}
