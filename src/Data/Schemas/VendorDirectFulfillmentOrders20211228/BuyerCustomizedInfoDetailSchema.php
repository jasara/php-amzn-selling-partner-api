<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class BuyerCustomizedInfoDetailSchema extends BaseSchema
{
    public function __construct(
        public ?string $customized_url = null,
    ) {}
}
