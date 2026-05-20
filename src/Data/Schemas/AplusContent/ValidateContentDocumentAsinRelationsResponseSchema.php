<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ValidateContentDocumentAsinRelationsResponseSchema extends BaseSchema
{
    public function __construct(
        public ?MessageSetSchema $warnings = null,
        public ?array $errors = null,
    ) {}
}
