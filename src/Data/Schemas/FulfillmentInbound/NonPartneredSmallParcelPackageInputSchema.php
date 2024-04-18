<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class NonPartneredSmallParcelPackageInputSchema extends BaseSchema
{
    public function __construct(
        public string $tracking_id,
    ) {
    }
}
