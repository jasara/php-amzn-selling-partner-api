<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\Services;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Services\RangeSlotCapacitySchema;

class GetRangeSlotCapacityResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public ?RangeSlotCapacitySchema $payload = null,
    ) {}

    public static function mapResponseToParameter(): string
    {
        return 'payload';
    }
}
