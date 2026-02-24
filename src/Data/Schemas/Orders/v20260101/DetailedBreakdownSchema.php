<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

final class DetailedBreakdownSchema extends BaseSchema
{
    public function __construct(
        public ?string $subtype,
        public ?MoneySchema $value,
    ) {
    }
}
