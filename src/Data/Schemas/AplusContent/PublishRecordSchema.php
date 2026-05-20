<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PublishRecordSchema extends BaseSchema
{
    public function __construct(
        public ?string $marketplace_id = null,
        public ?string $locale = null,
        public ?string $asin = null,
        public ?string $content_type = null,
        public ?string $content_sub_type = null,
        public ?string $content_reference_key = null,
    ) {}
}
