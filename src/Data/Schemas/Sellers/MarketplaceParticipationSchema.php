<?php

namespace Jasara\AmznSPA\Data\Schemas\Sellers;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class MarketplaceParticipationSchema extends BaseSchema
{
    public function __construct(
        public MarketplaceSchema $marketplace,
        public ParticipationSchema $participation,
    ) {
    }
}
