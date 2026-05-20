<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ServiceDocumentUploadDestinationSchema extends BaseSchema
{
    public function __construct(
        public ?string $upload_destination_id = null,
        public ?string $url = null,
        public ?EncryptionDetailsSchema $encryption_details = null,
        public ?array $headers = null,
    ) {}
}
