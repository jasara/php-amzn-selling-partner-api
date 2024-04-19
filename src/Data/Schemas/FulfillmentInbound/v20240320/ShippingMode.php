<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum ShippingMode: string
{
    case GroundSmallParcel = 'GROUND_SMALL_PARCEL';
    case FreightLTL = 'FREIGHT_LTL';
    case FreightFTLPallet = 'FREIGHT_FTL_PALLET';
    case FreightFTLNonpallet = 'FREIGHT_FTL_NONPALLET';
    case OceanLCL = 'OCEAN_LCL';
    case OceanFCL = 'OCEAN_FCL';
    case AirSmallParcel = 'AIR_SMALL_PARCEL';
    case AirSmallParcelExpress = 'AIR_SMALL_PARCEL_EXPRESS';
}
