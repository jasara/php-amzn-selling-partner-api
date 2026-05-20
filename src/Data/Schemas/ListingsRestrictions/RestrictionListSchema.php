<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ListingsRestrictions;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RestrictionListSchema extends BaseSchema
{
    public function __construct(
        public ?array $restrictions = null,
    ) {}
}
