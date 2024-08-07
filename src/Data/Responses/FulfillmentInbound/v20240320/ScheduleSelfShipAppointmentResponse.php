<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\SelfShipAppointmentDetailsSchema;

class ScheduleSelfShipAppointmentResponse extends BaseResponse
{
    public function __construct(
        public SelfShipAppointmentDetailsSchema $self_ship_appointment_details,
    ) {
    }
}
