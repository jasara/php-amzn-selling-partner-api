<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class NonPartneredSmallParcelPackageInputSchema extends DataTransferObject
{
    public string $tracking_id;
}
