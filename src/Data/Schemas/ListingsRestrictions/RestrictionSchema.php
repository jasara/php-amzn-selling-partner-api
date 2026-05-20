<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ListingsRestrictions;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RestrictionSchema extends BaseSchema
{
    public function __construct(
        public ?string $marketplace_id = null,
        public ?string $condition_type = null,
        public ?array $reasons = null,
    ) {}
}
