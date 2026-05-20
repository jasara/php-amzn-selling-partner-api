<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Solicitations;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetSolicitationActionsForOrderResponseSchema extends BaseSchema
{
    public function __construct(
        public ?array $_links = null,
        public ?array $_embedded = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
