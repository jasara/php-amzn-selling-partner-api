<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\AplusContent;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\AplusContent\MessageSetSchema;
use Jasara\AmznSPA\Data\Schemas\AplusContent\PublishRecordListSchema;

class SearchContentPublishRecordsResponse extends BaseResponse
{
    public function __construct(
        public ?MessageSetSchema $warnings = null,
        public ?string $next_page_token = null,
        public ?PublishRecordListSchema $publish_record_list = null,
    ) {}

}
