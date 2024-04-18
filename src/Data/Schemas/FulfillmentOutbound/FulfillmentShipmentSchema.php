<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FulfillmentShipmentSchema extends BaseSchema
{
    public function __construct(
        public string $amazon_shipment_id,
        public string $fulfillment_center_id,
        #[StringEnumValidator(['PENDING', 'SHIPPED', 'CANCELLED_BY_FULFILLER', 'CANCELLED_BY_SELLER'])]
        public string $fulfillment_shipment_status,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $shipping_date,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $estimated_arrival_date,
        public ?array $shipping_notes,
        public FulfillmentShipmentItemListSchema $fulfillment_shipment_item,
        public ?FulfillmentShipmentPackageListSchema $fulfillment_shipment_package,
    ) {
    }
}
