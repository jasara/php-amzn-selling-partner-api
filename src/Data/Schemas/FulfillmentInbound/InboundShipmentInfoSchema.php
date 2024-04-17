<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class InboundShipmentInfoSchema extends BaseSchema
{
    public function __construct(
        public ?string $shipment_id,
        public ?string $shipment_name,
        public ?AddressSchema $ship_from_address,
        public ?string $destination_fulfillment_center_id,
        #[StringEnumValidator(AmazonEnums::SHIPMENT_STATUSES)]
        public ?string $shipment_status,
        #[StringEnumValidator(['NO_LABEL', 'SELLER_LABEL', 'AMAZON_LABEL'])]
        public ?string $label_prep_type,
        public ?bool $are_cases_required,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $confirmed_need_by_date,
        #[StringEnumValidator(AmazonEnums::BOX_CONTENTS_SOURCES)]
        public ?string $box_contents_source,
        public ?BoxContentsFeeDetailsSchema $estimated_box_contents_fee,
    ) {
    }
}
