<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum ReasonComment: string
{
    case AppointmentRequestedByMistake = 'APPOINTMENT_REQUESTED_BY_MISTAKE';
    case VehicleDelay = 'VEHICLE_DELAY';
    case SlotNotSuitable = 'SLOT_NOT_SUITABLE';
    case OutsideCarrierBusinessHours = 'OUTSIDE_CARRIER_BUSINESS_HOURS';
    case UnfavourableExternalConditions = 'UNFAVOURABLE_EXTERNAL_CONDITIONS';
    case ProcurementDelay = 'PROCUREMENT_DELAY';
    case ShippingPlanChanged = 'SHIPPING_PLAN_CHANGED';
    case IncreasedQuantity = 'INCREASED_QUANTITY';
    case Other = 'OTHER';
}
