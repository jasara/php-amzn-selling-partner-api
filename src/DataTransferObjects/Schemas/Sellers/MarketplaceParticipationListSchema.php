<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Sellers;

use Illuminate\Support\Collection;

class MarketplaceParticipationListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): MarketplaceParticipationSchema
    {
        return parent::offsetGet($key);
    }
}
