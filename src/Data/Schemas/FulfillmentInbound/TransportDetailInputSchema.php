<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TransportDetailInputSchema extends BaseSchema
{
    public function __construct(
        public ?PartneredSmallParcelDataInputSchema $partnered_small_parcel_data,
        public ?NonPartneredSmallParcelDataInputSchema $non_partnered_small_parcel_data,
        public ?PartneredLtlDataInputSchema $partnered_ltl_data,
        public ?NonPartneredLtlDataInputSchema $non_partnered_ltl_data,
    ) {
    }
}
