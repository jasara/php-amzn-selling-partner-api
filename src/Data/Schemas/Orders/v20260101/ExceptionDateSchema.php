<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class ExceptionDateSchema extends BaseSchema
{
    public function __construct(
        public ?string $exception_date,
        public ?string $exception_date_type,
        public ?TimeWindowListSchema $time_windows,
    ) {
    }
}
