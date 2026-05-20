<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Messaging;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AttachmentSchema extends BaseSchema
{
    public function __construct(
        public ?string $upload_destination_id = null,
        public ?string $file_name = null,
    ) {}
}
