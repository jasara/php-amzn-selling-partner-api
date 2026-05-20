<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ListingsRestrictions;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ReasonSchema extends BaseSchema
{
    public function __construct(
        public ?string $message = null,
        public ?string $reason_code = null,
        public ?array $links = null,
    ) {}
}
