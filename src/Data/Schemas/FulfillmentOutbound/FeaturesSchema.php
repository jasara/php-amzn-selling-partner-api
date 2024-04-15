<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\DataTransferObject;

class FeaturesSchema extends DataTransferObject
{
    public string $feature_name;

    public string $feature_description;

    public ?bool $seller_eligible;
}
