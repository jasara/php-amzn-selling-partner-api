<?php

namespace Jasara\AmznSPA\Data\Schemas\Sellers;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<MarketplaceParticipationSchema>
 */
class MarketplaceParticipationListSchema extends TypedCollection
{
    protected string $item_class = MarketplaceParticipationSchema::class;
}
