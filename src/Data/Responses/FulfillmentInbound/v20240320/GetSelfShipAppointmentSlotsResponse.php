<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\SelfShipAppointmentSlotsAvailabilitySchema;
use Jasara\AmznSPA\Data\Schemas\PaginationSchema;

class GetSelfShipAppointmentSlotsResponse extends BaseResponse
{
    public function __construct(
        public SelfShipAppointmentSlotsAvailabilitySchema $self_ship_appointment_slots_availability,
        public ?PaginationSchema $pagination,
    ) {
    }
}
