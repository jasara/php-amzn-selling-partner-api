<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound;

use Jasara\AmznSPA\Contracts\PascalCaseRequestContract;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\InboundShipmentPlanRequestItemListSchema;

class CreateInboundShipmentPlanRequest extends BaseRequest implements PascalCaseRequestContract
{
    public function __construct(
        public AddressSchema $ship_from_address,
        #[StringEnumValidator(['SELLER_LABEL', 'AMAZON_LABEL_ONLY', 'AMAZON_LABEL_PREFERRED'])]
        public string $label_prep_preference,
        public ?string $ship_to_country_code,
        public ?string $ship_to_country_subdivision_code,
        public InboundShipmentPlanRequestItemListSchema $inbound_shipment_plan_request_items,
    ) {
    }
}
