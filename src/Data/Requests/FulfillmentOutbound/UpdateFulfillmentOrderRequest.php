<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\ShippingAddressSchema;

class UpdateFulfillmentOrderRequest extends BaseRequest
{
    public function __construct(
        public ?string $marketplace_id = null,
        public ?string $displayable_order_id = null,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $displayable_order_date = null,
        public ?string $displayable_order_comment = null,
        #[StringEnumValidator(['Standard', 'Expedited', 'Priority', 'ScheduledDelivery'])]
        public ?string $shipping_speed_category = null,
        public ?ShippingAddressSchema $destination_address = null,
        #[StringEnumValidator(['Ship', 'Hold'])]
        public ?string $fulfillment_action = null,
        #[StringEnumValidator(['FillOrKill', 'FillAll', 'FillAllAvailable'])]
        public ?string $fulfillment_policy = null,
    ) {
    }
}
