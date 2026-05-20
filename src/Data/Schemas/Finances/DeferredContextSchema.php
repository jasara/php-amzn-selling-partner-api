<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class DeferredContextSchema extends BaseSchema
{
    public function __construct(
        public ?string $deferral_reason = null,
        public ?string $maturity_date = null,
    ) {}
}
