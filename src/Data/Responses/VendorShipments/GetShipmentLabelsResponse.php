<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorShipments;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorShipments\GetShipmentLabelsSchema;

class GetShipmentLabelsResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public ?GetShipmentLabelsSchema $payload = null,
    ) {}

    public static function mapResponseToParameter(): string
    {
        return 'payload';
    }
}
