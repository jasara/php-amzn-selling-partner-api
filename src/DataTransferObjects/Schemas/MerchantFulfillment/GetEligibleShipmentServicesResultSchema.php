<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetEligibleShipmentServicesResultSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: ShippingServiceSchema::class)]
    public ShippingServiceListSchema $shipping_service_list;

    #[CastWith(ArrayCaster::class, itemType: RejectedShippingServiceSchema::class)]
    public ?RejectedShippingServiceListSchema $rejected_shipping_service_list;

    #[CastWith(ArrayCaster::class, itemType: TemporarilyUnavailableCarrierSchema::class)]
    public ?TemporarilyUnavailableCarrierListSchema $temporarily_unavailable_carrier_list;

    #[CastWith(ArrayCaster::class, itemType: TermsAndConditionsNotAcceptedCarrierSchema::class)]
    public ?TermsAndConditionsNotAcceptedCarrierListSchema $terms_and_conditions_not_accepted_carrierList;
}
