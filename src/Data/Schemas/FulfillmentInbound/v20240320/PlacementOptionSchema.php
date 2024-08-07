<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PlacementOptionSchema extends BaseSchema
{
    public function __construct(
        public IncentiveSchemaList $discounts,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $expiration,
        public ?IncentiveSchemaList $fees,
        #[RuleValidator(['size:38'])]
        public string $placement_option_id,
        public array $shipment_ids,
        public PlacementOptionStatus $status,
    ) {
    }
}
