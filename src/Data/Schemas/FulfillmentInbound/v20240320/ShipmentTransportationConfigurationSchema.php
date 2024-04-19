<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentTransportationConfigurationSchema extends BaseSchema
{
    public function __construct(
        public ?ContactInformationSchema $contact_information,
        public ?PalletInformationSchema $pallet_information,
        public WindowInputSchema $ready_to_ship_window,
        #[RuleValidator(['size:38'])]
        public string $shipment_id,
    ) {
    }
}
