<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Sellers;

use Illuminate\Support\Collection;

class MarketplaceParticipationListSchema extends Collection
{
    public function offsetGet($key): MarketplaceParticipationSchema
    {
        return parent::offsetGet($key);
    }
}
