<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class TransportDetailInputSchema extends DataTransferObject
{
    public ?PartneredSmallParcelDataInputSchema $partnered_small_parcel_data;

    public ?NonPartneredSmallParcelDataInputSchema $non_partnered_small_parcel_data;

    public ?PartneredLtlDataInputSchema $partnered_ltl_data;

    public ?NonPartneredLtlDataInputSchema $non_partnered_ltl_data;
}
