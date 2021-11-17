<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class FeatureSettingShema extends DataTransferObject
{
    public ?string $feature_name;

    #[StringEnumValidator(['Required', 'NotRequired'])]
    public ?string $feature_fulfillment_policy;
}
