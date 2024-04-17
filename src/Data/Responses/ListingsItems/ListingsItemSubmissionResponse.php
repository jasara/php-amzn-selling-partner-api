<?php

namespace Jasara\AmznSPA\Data\Responses\ListingsItems;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\IssuesListSchema;

class ListingsItemSubmissionResponse extends BaseResponse
{
    public function __construct(
        public ?string $sku,
        public ?string $status,
        public ?string $submission_id,

        public ?IssuesListSchema $issues,
    ) {
    }
}
