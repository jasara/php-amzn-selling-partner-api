<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class InboundShipmentItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $shipment_id,
        public string $seller_sku,
        public ?string $fulfillment_network_sku,
        public int $quantity_shipped,
        public ?int $quantity_received,
        public ?int $quantity_in_case,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $release_date,

        public ?PrepDetailsListSchema $prep_details_list,
    ) {
    }
}
