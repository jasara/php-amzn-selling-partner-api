<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FulfillmentDocumentSchema extends BaseSchema
{
    public function __construct(
        public ?string $upload_destination_id = null,
        public ?string $content_sha256 = null,
    ) {}
}
