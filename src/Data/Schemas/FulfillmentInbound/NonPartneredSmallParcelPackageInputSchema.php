<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class NonPartneredSmallParcelPackageInputSchema extends DataTransferObject
{
    public string $tracking_id;
}
