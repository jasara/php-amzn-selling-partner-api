<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InboundPlanSummarySchema extends BaseSchema
{
    public function __construct(
        public ContactInformationSchema $contact_information,
        #[CarbonFromStringCaster]
        public CarbonImmutable $created_at,
        #[CarbonFromStringCaster]
        public CarbonImmutable $last_updated_at,
        #[RuleValidator(['size:38'])]
        public string $inbound_plan_id,
        public array $marketplace_ids,
        public string $name,
        public AddressSchema $source_address,
        public InboundPlanStatus $status,
    ) {
    }
}
