<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransportDetailOutputSchema extends BaseSchema
{
    public function __construct(
        public ?PartneredSmallParcelDataOutputSchema $partnered_small_parcel_data,
        public ?NonPartneredSmallParcelDataOutputSchema $non_partnered_small_parcel_data,
        public ?PartneredLtlDataOutputSchema $partnered_ltl_data,
        public ?NonPartneredLtlDataOutputSchema $non_partnered_ltl_data,
    ) {
    }
}
