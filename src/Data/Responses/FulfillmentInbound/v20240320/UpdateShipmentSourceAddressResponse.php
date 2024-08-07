<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Responses\BaseResponse;

class UpdateShipmentSourceAddressResponse extends BaseResponse
{
    public function __construct(
        #[RuleValidator(['min:36', 'max:38'])]
        public string $operation_id,
    ) {
    }
}
