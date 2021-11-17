<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\DataTransferObject;

class FeaturesSchema extends DataTransferObject
{
    public string $feature_name;

    public string $feature_description;

    public ?bool $seller_eligible;
}
