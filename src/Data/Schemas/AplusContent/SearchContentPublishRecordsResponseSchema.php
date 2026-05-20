<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SearchContentPublishRecordsResponseSchema extends BaseSchema
{
    public function __construct(
        public ?MessageSetSchema $warnings = null,
        public ?string $next_page_token = null,
        public ?PublishRecordListSchema $publish_record_list = null,
    ) {}
}
