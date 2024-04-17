<?php

namespace Jasara\AmznSPA\Data\Schemas\Uploads;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class UploadDestinationSchema extends BaseSchema
{
    public function __construct(
        public ?string $upload_destination_id,
        public ?string $url,
        public ?array $headers,
    ) {
    }
}
