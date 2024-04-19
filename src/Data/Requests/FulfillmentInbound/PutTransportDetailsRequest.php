<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound;

use Jasara\AmznSPA\Contracts\PascalCaseRequestContract;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0\TransportDetailInputSchema;

class PutTransportDetailsRequest extends BaseRequest implements PascalCaseRequestContract
{
    public function __construct(
        public bool $is_partnered,
        #[StringEnumValidator(['SP', 'LTL'])]
        public string $shipment_type,
        public TransportDetailInputSchema $transport_details,
    ) {
    }
}
