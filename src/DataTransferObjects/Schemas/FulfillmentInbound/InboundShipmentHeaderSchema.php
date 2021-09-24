<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class InboundShipmentHeaderSchema extends DataTransferObject
{
    public string $shipment_name;

    public AddressSchema $shipment_from_address;

    public string $destination_fulfillment_center_id;

    public ?bool $are_cases_required;

    #[StringEnumValidator(AmazonEnums::SHIPMENT_STATUSES)]
    public string $shipment_status;

    #[StringEnumValidator(['SELLER_LABEL', 'AMAZON_LABEL_ONLY', 'AMAZON_LABEL_PREFERRED'])]
    public string $label_prep_preference;

    #[StringEnumValidator(['NONE', 'FEED', '2D_BARCODE'])]
    public ?string $intended_box_contents_source;
}
