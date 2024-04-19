<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\ContactInformationSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\InboundPlanStatus;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\PackingOptionSummaryListSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\PlacementOptionSummaryListSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\ShipmentSummaryListSchema;

class GetInboundPlanResponse extends BaseResponse
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
        public PackingOptionSummaryListSchema $packing_options,
        public PlacementOptionSummaryListSchema $placement_options,
        public ShipmentSummaryListSchema $shipments,
        public AddressSchema $source_address,
        public InboundPlanStatus $status,
    ) {
    }
}
