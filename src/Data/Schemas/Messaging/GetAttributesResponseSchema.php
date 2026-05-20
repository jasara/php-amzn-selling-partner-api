<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Messaging;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetAttributesResponseSchema extends BaseSchema
{
    public function __construct(
        public ?array $buyer = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
