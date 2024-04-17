<?php

namespace Jasara\AmznSPA\Data\Requests\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\Shipping\ContainerListSchema;
use Jasara\AmznSPA\Data\Schemas\Shipping\LabelSpecificationSchema;
use Jasara\AmznSPA\Data\Schemas\ShippingAddressSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class PurchaseShipmentRequest extends BaseRequest
{
    public function __construct(
        #[MaxLengthValidator(40)]
        public string $client_reference_id,
        public ShippingAddressSchema $ship_to,
        public ShippingAddressSchema $ship_from,
        #[CastWith(CarbonFromStringCaster::class)]
        public CarbonImmutable $ship_date,
        #[StringEnumValidator(['Amazon Shipping Ground', 'Amazon Shipping Standard', 'Amazon Shipping Premium'])]
        public string $service_type,

        public ContainerListSchema $containers,
        public LabelSpecificationSchema $label_specification,
    ) {
    }
}
