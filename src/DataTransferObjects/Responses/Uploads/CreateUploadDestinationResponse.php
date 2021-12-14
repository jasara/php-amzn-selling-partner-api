<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Uploads;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Uploads\UploadDestinationSchema;

class CreateUploadDestinationResponse extends BaseResponse
{
    public ?UploadDestinationSchema $payload;
}
