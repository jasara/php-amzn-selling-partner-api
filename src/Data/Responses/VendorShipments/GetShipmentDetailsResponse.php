<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorShipments;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorShipments\ShipmentDetailsSchema;

class GetShipmentDetailsResponse extends BaseResponse
{
    public function __construct(
        public ?ShipmentDetailsSchema $payload = null,
    ) {}

}
