<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\Messaging;

use Jasara\AmznSPA\Data\Responses\BaseResponse;

class GetAttributesResponse extends BaseResponse
{
    public function __construct(
        public ?array $buyer = null,
    ) {}

}
