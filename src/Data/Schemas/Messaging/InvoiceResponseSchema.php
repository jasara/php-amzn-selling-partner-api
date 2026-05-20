<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Messaging;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InvoiceResponseSchema extends BaseSchema
{
    public function __construct(
        public ?ErrorListSchema $errors = null,
    ) {}
}
