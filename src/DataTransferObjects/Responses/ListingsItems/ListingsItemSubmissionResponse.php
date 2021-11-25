<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\ListingsItems;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\IssueSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems\IssuesShema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class ListingsItemSubmissionResponse extends BaseResponse
{
    public string $sku;

    public string $status; //enum

    public string $submission_id;

    #[CastWith(ArrayCaster::class, itemType: IssueSchema::class)]
    public ?IssuesShema $issues;
}
