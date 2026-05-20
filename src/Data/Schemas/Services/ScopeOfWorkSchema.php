<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ScopeOfWorkSchema extends BaseSchema
{
    public function __construct(
        public ?string $asin = null,
        public ?string $title = null,
        public ?int $quantity = null,
        public ?array $required_skills = null,
    ) {}
}
