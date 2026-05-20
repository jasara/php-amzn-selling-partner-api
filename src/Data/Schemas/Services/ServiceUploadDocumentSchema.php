<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ServiceUploadDocumentSchema extends BaseSchema
{
    public function __construct(
        public ?string $content_type = null,
        public ?float $content_length = null,
        public ?string $content_md5 = null,
    ) {}
}
