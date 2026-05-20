<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\ListingsRestrictions;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ListingsRestrictions\RestrictionListSchema;

class GetListingsRestrictionsResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public ?RestrictionListSchema $payload = null,
    ) {}

    public static function mapResponseToParameter(): string
    {
        return 'payload';
    }
}
