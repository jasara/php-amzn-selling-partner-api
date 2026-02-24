<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\Orders\v20260101;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Orders\v20260101\OrderListSchema;
use Jasara\AmznSPA\Data\Schemas\PaginationSchema;

final class SearchOrdersResponse extends BaseResponse
{
    public function __construct(
        public OrderListSchema $orders,
        public ?PaginationSchema $pagination,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $last_updated_before,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $created_before,
    ) {
    }
}
