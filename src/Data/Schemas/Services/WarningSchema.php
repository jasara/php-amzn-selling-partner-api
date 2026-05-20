<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class WarningSchema extends BaseSchema
{
    public function __construct(
        public ?string $code = null,
        public ?string $message = null,
        public ?string $details = null,
    ) {}
}
