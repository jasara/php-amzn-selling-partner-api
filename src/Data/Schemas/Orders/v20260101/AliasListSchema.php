<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<AliasSchema>
 */
final class AliasListSchema extends TypedCollection
{
    public const ITEM_CLASS = AliasSchema::class;
}
