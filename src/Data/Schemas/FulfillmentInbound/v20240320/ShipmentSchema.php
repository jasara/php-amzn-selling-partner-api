<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['min:1', 'max:1024'])]
        public ?string $amazon_reference_id,
        public ?ContactInformationSchema $contact_information,
        public DatesSchema $dates,
        public ShipmentDestinationSchema $destination,
        public ?FreightInformationSchema $freight_information,
        public ?string $name,
        #[RuleValidator(['size:38'])]
        public string $placement_option_id,
        public ?SelectedDeliveryWindowSchema $selected_delivery_window,
        #[RuleValidator(['size:38'])]
        public ?string $selected_transportation_option_id,
        public ?SelfShipAppointmentDetailsSchemaList $self_ship_appointment_details,
        #[RuleValidator(['min:1', 'max:1024'])]
        public ?string $shipment_confirmation_id,
        #[RuleValidator(['size:38'])]
        public string $shipment_id,
        public ShipmentSourceSchema $source,
        public ?ShipmentStatus $status,
        public ?TrackingDetailsSchema $tracking_details,
    ) {
    }
}
