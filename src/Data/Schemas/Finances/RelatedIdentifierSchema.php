<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RelatedIdentifierSchema extends BaseSchema
{
    public function __construct(
        public ?string $related_identifier_name = null,
        public ?string $related_identifier_value = null,
    ) {}
}
