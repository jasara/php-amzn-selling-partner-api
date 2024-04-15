<?php

namespace Jasara\AmznSPA\Data\Schemas\Sellers;

use Illuminate\Support\Collection;

class MarketplaceParticipationListSchema extends Collection
{
    public function offsetGet($key): MarketplaceParticipationSchema
    {
        return parent::offsetGet($key);
    }
}
