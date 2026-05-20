<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemRelatedIdentifierSchema extends BaseSchema
{
    public function __construct(
        public ?string $item_related_identifier_name = null,
        public ?string $item_related_identifier_value = null,
    ) {}
}
