<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class ProductConditionSchema extends BaseSchema
{
    public function __construct(
        public ?string $condition_type,
        public ?string $condition_subtype,
        public ?string $condition_note,
    ) {
    }
}
