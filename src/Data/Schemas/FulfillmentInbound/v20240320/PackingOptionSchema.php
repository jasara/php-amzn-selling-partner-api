<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PackingOptionSchema extends BaseSchema
{
    public function __construct(
        public IncentiveListSchema $discounts,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $expiration,
        public IncentiveListSchema $fees,
        #[RuleValidator(['size:38'])]
        public string $inbound_plan_id,
        public array $packing_groups,
        #[RuleValidator(['size:38'])]
        public string $packing_option_id,
        public PackingOptionStatus $status,
        public ShippingConfigurationListSchema $supported_shipping_configurations,
    ) {
    }
}
