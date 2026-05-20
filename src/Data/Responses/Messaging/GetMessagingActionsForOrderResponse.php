<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\Messaging;

use Jasara\AmznSPA\Data\Responses\BaseResponse;

class GetMessagingActionsForOrderResponse extends BaseResponse
{
    public function __construct(
        public ?array $_links = null,
        public ?array $_embedded = null,
    ) {}

}
