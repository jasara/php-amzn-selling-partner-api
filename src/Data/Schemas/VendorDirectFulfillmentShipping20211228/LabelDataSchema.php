<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LabelDataSchema extends BaseSchema
{
    public function __construct(
        public ?string $package_identifier = null,
        public ?string $tracking_number = null,
        public ?string $ship_method = null,
        public ?string $ship_method_name = null,
        public ?string $content = null,
    ) {}
}
