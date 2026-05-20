<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $description = null,
        public ?ItemRelatedIdentifiersSchema $related_identifiers = null,
        public ?CurrencySchema $total_amount = null,
        public ?array $breakdowns = null,
        public ?ContextsSchema $contexts = null,
    ) {}
}
