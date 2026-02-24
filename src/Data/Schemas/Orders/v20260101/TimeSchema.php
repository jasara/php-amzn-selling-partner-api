<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class TimeSchema extends BaseSchema
{
    public function __construct(
        public ?int $hour,
        public ?int $minute,
    ) {
    }
}
