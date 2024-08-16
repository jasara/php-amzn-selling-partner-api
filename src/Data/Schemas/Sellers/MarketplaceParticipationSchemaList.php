<?php

namespace Jasara\AmznSPA\Data\Schemas\Sellers;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<MarketplaceParticipationSchema>
 */
class MarketplaceParticipationSchemaList extends TypedCollection
{
    public const ITEM_CLASS = MarketplaceParticipationSchema::class;
}
