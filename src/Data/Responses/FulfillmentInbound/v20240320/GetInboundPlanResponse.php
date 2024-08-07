<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\InboundPlanStatus;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\PackingOptionSummarySchemaList;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\PlacementOptionSummarySchemaList;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\ShipmentSummarySchemaList;

class GetInboundPlanResponse extends BaseResponse
{
    public function __construct(
        #[CarbonFromStringCaster]
        public CarbonImmutable $created_at,
        #[CarbonFromStringCaster]
        public CarbonImmutable $last_updated_at,
        #[RuleValidator(['size:38'])]
        public string $inbound_plan_id,
        public array $marketplace_ids,
        public string $name,
        public PackingOptionSummarySchemaList $packing_options,
        public PlacementOptionSummarySchemaList $placement_options,
        public ShipmentSummarySchemaList $shipments,
        public AddressSchema $source_address,
        public InboundPlanStatus $status,
    ) {
    }
}
