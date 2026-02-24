<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\Orders\v20260101;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Orders\v20260101\OrderSchema;

final class GetOrderResponse extends BaseResponse
{
    public function __construct(
        public ?OrderSchema $order,
    ) {
    }
}
