<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Uploads;

use Spatie\DataTransferObject\DataTransferObject;

class UploadDestinationSchema extends DataTransferObject
{
    public ?string $upload_destination_id;

    public ?string $url;

    public ?object $headers; //this line fail bcoz it get an error thats array not object
}
