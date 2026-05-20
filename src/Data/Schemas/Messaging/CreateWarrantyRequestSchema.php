<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Messaging;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CreateWarrantyRequestSchema extends BaseSchema
{
    public function __construct(
        public ?array $attachments = null,
        public ?string $coverage_start_date = null,
        public ?string $coverage_end_date = null,
    ) {}
}
