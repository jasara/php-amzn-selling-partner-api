<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class TransportDetailOutputSchema extends DataTransferObject
{
    public ?PartneredSmallParcelDataOutputSchema $partnered_small_parcel_data;

    public ?NonPartneredSmallParcelDataOutputSchema $non_partnered_small_parcel_data;

    public ?PartneredLtlDataOutputSchema $partnered_ltl_data;

    public ?NonPartneredLtlDataOutputSchema $non_partnered_ltl_data;
}
