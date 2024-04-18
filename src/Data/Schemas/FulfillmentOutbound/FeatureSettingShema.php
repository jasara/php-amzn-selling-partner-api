<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeatureSettingShema extends BaseSchema
{
    public function __construct(
        public ?string $feature_name,
        #[StringEnumValidator(['Required', 'NotRequired'])]
        public ?string $feature_fulfillment_policy,
    ) {
    }
}
