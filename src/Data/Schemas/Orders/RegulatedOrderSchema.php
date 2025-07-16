<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RegulatedOrderSchema extends BaseSchema
{
    public function __construct(
        public string $amazon_order_id,
        public RegulatedInformationSchema $regulated_information,
        public bool $requires_dosage_label,
        public RegulatedOrderVerificationStatusSchema $regulated_order_verification_status,
    ) {
    }
}
