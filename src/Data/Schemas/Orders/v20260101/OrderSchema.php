<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class OrderSchema extends BaseSchema
{
    public function __construct(
        public string $order_id,
        #[CarbonFromStringCaster]
        public CarbonImmutable $created_time,
        #[CarbonFromStringCaster]
        public CarbonImmutable $last_updated_time,
        public SalesChannelSchema $sales_channel,
        public OrderItemListSchema $order_items,
        public ?AliasListSchema $order_aliases,
        public ?array $programs,
        public ?AssociatedOrderListSchema $associated_orders,
        public ?BuyerSchema $buyer,
        public ?RecipientSchema $recipient,
        public ?OrderProceedsSchema $proceeds,
        public ?OrderFulfillmentSchema $fulfillment,
        public ?OrderPackageListSchema $packages,
    ) {
    }
}
