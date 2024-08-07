<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransportationSelectionSchema extends BaseSchema
{
    public function __construct(
        public ?ContactInformationSchema $contact_information,
        public ?WindowInputSchema $delivery_window,
        #[RuleValidator(['size:38'])]
        public string $shipment_id,
        #[RuleValidator(['size:38'])]
        public string $transportation_option_id,
    ) {
    }
}
