<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class TransportHeaderSchema extends DataTransferObject
{
    public string $seller_id;

    public string $shipment_id;

    public ?bool $is_partnered;

    #[StringEnumValidator(['SP', 'LTL'])]
    public string $shipment_type;
}
