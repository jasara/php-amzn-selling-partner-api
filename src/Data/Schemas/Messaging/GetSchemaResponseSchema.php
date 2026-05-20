<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Messaging;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetSchemaResponseSchema extends BaseSchema
{
    public function __construct(
        public ?array $_links = null,
        public ?SchemaSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
