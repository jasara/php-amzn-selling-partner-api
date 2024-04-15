<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\ShippingAddressSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;

class UpdateFulfillmentOrderRequest extends BaseRequest
{
    public ?string $marketplace_id;

    public ?string $displayable_order_id;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $displayable_order_date;

    public ?string $displayable_order_comment;

    #[StringEnumValidator(['Standard', 'Expedited', 'Priority', 'ScheduledDelivery'])]
    public ?string $shipping_speed_category;

    public ?ShippingAddressSchema $destination_address;

    #[StringEnumValidator(['Ship', 'Hold'])]
    public ?string $fulfillment_action;

    #[StringEnumValidator(['FillOrKill', 'FillAll', 'FillAllAvailable'])]
    public ?string $fulfillment_policy;
}
