<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ShippingAddressSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
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
