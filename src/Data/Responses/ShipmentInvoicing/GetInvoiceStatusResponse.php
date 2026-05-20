<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\ShipmentInvoicing;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ShipmentInvoicing\ShipmentInvoiceStatusResponseSchema;

class GetInvoiceStatusResponse extends BaseResponse
{
    public function __construct(
        public ?ShipmentInvoiceStatusResponseSchema $payload = null,
    ) {}

}
