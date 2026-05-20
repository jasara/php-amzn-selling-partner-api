<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ContainerLabelSchema extends BaseSchema
{
    public function __construct(
        public ?string $container_tracking_number = null,
        public ?string $content = null,
        public ?string $format = null,
    ) {}
}
