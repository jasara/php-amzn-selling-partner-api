<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ASINPrepInstructionsSchema extends DataTransferObject
{
    public ?string $asin;

    #[StringEnumValidator(['RequiresFNSKULabel', 'CanUseOriginalBarcode', 'MustProvideSellerSKU'])]
    public ?string $barcode_instruction;

    #[StringEnumValidator(['ConsultHelpDocuments', 'NoAdditionalPrepRequired', 'SeePrepInstructionsList'])]
    public ?string $prep_guidance;

    #[StringArrayEnumValidator(AmazonEnums::PREP_INSTRUCTIONS)]
    public ?array $prep_instruction_list;
}
