<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class FeatureSettingShema extends DataTransferObject
{
    public ?string $feature_name;

    #[StringEnumValidator(['Required', 'NotRequired'])]
    public ?string $feature_fulfillment_policy;
}
