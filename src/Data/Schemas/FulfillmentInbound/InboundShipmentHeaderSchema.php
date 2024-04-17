<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InboundShipmentHeaderSchema extends BaseSchema
{
    public function __construct(
        public string $shipment_name,
        public AddressSchema $ship_from_address,
        public string $destination_fulfillment_center_id,
        public ?bool $are_cases_required,
        #[StringEnumValidator(AmazonEnums::SHIPMENT_STATUSES)]
        public string $shipment_status,
        #[StringEnumValidator(['SELLER_LABEL', 'AMAZON_LABEL_ONLY', 'AMAZON_LABEL_PREFERRED'])]
        public string $label_prep_preference,
        #[StringEnumValidator(['NONE', 'FEED', '2D_BARCODE'])]
        public ?string $intended_box_contents_source,
    ) {
    }
}
