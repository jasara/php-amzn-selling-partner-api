<?php

namespace Jasara\AmznSPA\Data\Responses\Uploads;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Uploads\UploadDestinationSchema;

class CreateUploadDestinationResponse extends BaseResponse
{
    public ?UploadDestinationSchema $payload;
}
