<?php

namespace Jasara\AmznSPA\Data\Schemas\Tokens;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<RestrictedResourceSchema>
 */
class RestrictedResourcesListSchema extends TypedCollection
{
    protected string $item_class = RestrictedResourceSchema::class;
}
