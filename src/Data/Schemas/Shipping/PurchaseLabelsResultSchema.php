<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class PurchaseLabelsResultSchema extends DataTransferObject
{
    public string $shipment_id;

    public ?string $client_reference_id;

    public AcceptedRateSchema $accepted_rate;

    #[CastWith(ArrayCaster::class, itemType: LabelResultSchema::class)]
    public LabelResultListSchema $label_results;
}
