<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound;

use Jasara\AmznSPA\Contracts\PascalCaseRequestContract;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\TransportDetailInputSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class PutTransportDetailsRequest extends DataTransferObject implements PascalCaseRequestContract
{
    public bool $is_partnered;

    #[StringEnumValidator(['SP', 'LTL'])]
    public string $shipment_type;

    public TransportDetailInputSchema $transport_details;
}
