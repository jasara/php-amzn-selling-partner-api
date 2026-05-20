<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Messaging;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CreateLegalDisclosureRequestSchema extends BaseSchema
{
    public function __construct(
        public ?array $attachments = null,
    ) {}
}
