<?php

namespace Jasara\AmznSPA\Data\Schemas\Tokens;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<RestrictedResourceSchema>
 */
class RestrictedResourcesListSchema extends TypedCollection
{
    public const string ITEM_CLASS = RestrictedResourceSchema::class;
}
