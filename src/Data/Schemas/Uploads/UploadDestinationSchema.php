<?php

namespace Jasara\AmznSPA\Data\Schemas\Uploads;

use Spatie\DataTransferObject\DataTransferObject;

class UploadDestinationSchema extends DataTransferObject
{
    public ?string $upload_destination_id;

    public ?string $url;

    public ?array $headers;
}
