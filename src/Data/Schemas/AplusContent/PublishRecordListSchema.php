<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<PublishRecordSchema>
 */
class PublishRecordListSchema extends TypedCollection
{
    public const ITEM_CLASS = PublishRecordSchema::class;
}
