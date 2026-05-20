<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorInvoices;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AdditionalDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $type = null,
        public ?string $detail = null,
        public ?string $language_code = null,
    ) {}
}
