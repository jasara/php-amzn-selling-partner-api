<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound;

use Jasara\AmznSPA\Contracts\PascalCaseRequestContract;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\TransportDetailInputSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;

class PutTransportDetailsRequest extends BaseRequest implements PascalCaseRequestContract
{
    public bool $is_partnered;

    #[StringEnumValidator(['SP', 'LTL'])]
    public string $shipment_type;

    public TransportDetailInputSchema $transport_details;
}
