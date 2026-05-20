<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Transfers;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ExpiryDateSchema extends BaseSchema
{
    public function __construct(
        public ?string $month = null,
        public ?string $year = null,
    ) {}
}
