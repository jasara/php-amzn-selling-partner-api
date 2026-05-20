<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CompleteServiceJobByServiceJobIdResponseSchema extends BaseSchema
{
    public function __construct(
        public ?ErrorListSchema $errors = null,
    ) {}
}
