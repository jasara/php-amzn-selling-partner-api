<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ContentMetadataRecordSchema extends BaseSchema
{
    public function __construct(
        public ?string $content_reference_key = null,
        public ?ContentMetadataSchema $content_metadata = null,
    ) {}
}
