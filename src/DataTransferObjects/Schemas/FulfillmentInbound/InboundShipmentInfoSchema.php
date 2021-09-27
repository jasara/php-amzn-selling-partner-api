<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class InboundShipmentInfoSchema extends DataTransferObject
{
    public ?string $shipment_id;

    public ?string $shipment_name;

    public ?AddressSchema $ship_from_address;

    public ?string $destination_fulfillment_center_id;

    #[StringEnumValidator(AmazonEnums::SHIPMENT_STATUSES)]
    public ?string $shipment_status;

    #[StringEnumValidator(['NO_LABEL', 'SELLER_LABEL', 'AMAZON_LABEL'])]
    public ?string $label_prep_type;

    public bool $are_cases_required;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $confirmed_need_by_date;

    #[StringEnumValidator(AmazonEnums::BOX_CONTENTS_SOURCES)]
    public ?string $box_contents_source;

    public ?BoxContentsFeeDetailsSchema $estimated_box_contents_fee;
}
