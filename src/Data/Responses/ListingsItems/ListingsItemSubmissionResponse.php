<?php

namespace Jasara\AmznSPA\Data\Responses\ListingsItems;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\IssueSchema;
use Jasara\AmznSPA\Data\Schemas\ListingsItems\IssuesListSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class ListingsItemSubmissionResponse extends BaseResponse
{
    public ?string $sku;
    public ?string $status;
    public ?string $submission_id;

    #[CastWith(ArrayCaster::class, itemType: IssueSchema::class)]
    public ?IssuesListSchema $issues;
}
