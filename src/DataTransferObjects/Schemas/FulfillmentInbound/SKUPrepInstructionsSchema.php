<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class SKUPrepInstructionsSchema extends DataTransferObject
{
    public ?string $seller_sku;

    public ?string $asin;

    #[StringEnumValidator(['RequiresFNSKULabel', 'CanUseOriginalBarcode', 'MustProvideSellerSKU'])]
    public ?string $barcode_instruction;

    #[StringEnumValidator(['ConsultHelpDocuments', 'NoAdditionalPrepRequired', 'SeePrepInstructionsList'])]
    public ?string $prep_guidance;

    #[StringArrayEnumValidator(AmazonEnums::PREP_INSTRUCTIONS)]
    public ?array $prep_instruction_list;

    #[CastWith(ArrayCaster::class, itemType: AmazonPrepFeesDetailsSchema::class)]
    public ?AmazonPrepFeesDetailsListSchema $amazon_prep_fees_details_list;
}
