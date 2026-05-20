<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransportationLabelsSchema extends BaseSchema
{
    public function __construct(
        public ?PaginationSchema $pagination = null,
        public ?array $transport_labels = null,
    ) {}
}
