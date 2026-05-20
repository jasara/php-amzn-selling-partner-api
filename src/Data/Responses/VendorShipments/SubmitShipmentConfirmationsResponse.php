<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorShipments;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorShipments\TransactionReferenceSchema;

class SubmitShipmentConfirmationsResponse extends BaseResponse
{
    public function __construct(
        public ?TransactionReferenceSchema $payload = null,
    ) {}

}
