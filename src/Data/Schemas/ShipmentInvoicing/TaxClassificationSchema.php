<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ShipmentInvoicing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TaxClassificationSchema extends BaseSchema
{
    public function __construct(
        public ?string $name = null,
        public ?string $value = null,
    ) {}
}
