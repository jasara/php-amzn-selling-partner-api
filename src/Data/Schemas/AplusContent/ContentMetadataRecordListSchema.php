<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ContentMetadataRecordSchema>
 */
class ContentMetadataRecordListSchema extends TypedCollection
{
    public const ITEM_CLASS = ContentMetadataRecordSchema::class;
}
