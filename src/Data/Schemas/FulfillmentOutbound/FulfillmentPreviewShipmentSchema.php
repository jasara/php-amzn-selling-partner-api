<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FulfillmentPreviewShipmentSchema extends BaseSchema
{
    public function __construct(
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $earliest_ship_date,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $latest_ship_date,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $earliest_arrival_date,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $latest_arrival_date,
        public ?array $shipping_notes,
        public GetFulfillmentPreviewItemListSchema $fulfillment_preview_items,
    ) {
    }
}
