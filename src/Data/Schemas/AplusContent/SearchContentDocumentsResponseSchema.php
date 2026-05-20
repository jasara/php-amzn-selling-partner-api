<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SearchContentDocumentsResponseSchema extends BaseSchema
{
    public function __construct(
        public ?MessageSetSchema $warnings = null,
        public ?string $next_page_token = null,
        public ?ContentMetadataRecordListSchema $content_metadata_records = null,
    ) {}
}
