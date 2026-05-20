<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShippingLabelListSchema extends BaseSchema
{
    public function __construct(
        public ?PaginationSchema $pagination = null,
        public ?array $shipping_labels = null,
    ) {}
}
