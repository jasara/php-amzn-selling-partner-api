<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Mappers\CarbonToDateStringMapper;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\ContactSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;

class PartneredLtlDataInputSchema extends BaseSchema
{
    public function __construct(
        public ?ContactSchema $contact,
        public ?int $box_count,
        #[StringEnumValidator(AmazonEnums::SELLER_FREIGHT_CLASSES)]
        public ?string $seller_freight_class,
        #[CarbonFromStringCaster]
        #[CarbonToDateStringMapper]
        public ?CarbonImmutable $freight_ready_date,
        public ?PalletListSchema $pallet_list,
        public ?WeightSchema $total_weight,
        public ?AmountSchema $seller_declared_value,
    ) {
    }
}
