<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PurchaseLabelsResultSchema extends BaseSchema
{
    public function __construct(
        public string $shipment_id,
        public ?string $client_reference_id,
        public AcceptedRateSchema $accepted_rate,

        public LabelResultListSchema $label_results,
    ) {
    }
}
