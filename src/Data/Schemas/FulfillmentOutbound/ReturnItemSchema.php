<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class ReturnItemSchema extends DataTransferObject
{
    public string $seller_return_item_id;

    public string $seller_fulfillment_order_item_id;

    public string $amazon_shipment_id;

    public string $seller_return_reason_code;

    public ?string $return_comment;

    public ?string $amazon_return_reason_code;

    #[StringEnumValidator(['New', 'Processed'])]
    public string $status;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $status_changed_date;

    public ?string $return_authorization_id;

    #[StringEnumValidator(AmazonEnums::RETURN_ITEM_DISPOSITION)]
    public ?string $return_received_condition;

    public ?string $fulfillment_center_id;
}
