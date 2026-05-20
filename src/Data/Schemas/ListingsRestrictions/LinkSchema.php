<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ListingsRestrictions;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LinkSchema extends BaseSchema
{
    public function __construct(
        public ?string $resource = null,
        public ?string $verb = null,
        public ?string $title = null,
        public ?string $type = null,
    ) {}
}
