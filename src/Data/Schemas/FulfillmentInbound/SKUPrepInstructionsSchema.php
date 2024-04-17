<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SkuPrepInstructionsSchema extends BaseSchema
{
    public function __construct(
        public ?string $seller_sku,
        public ?string $asin,
        #[StringEnumValidator(['RequiresFNSKULabel', 'CanUseOriginalBarcode', 'MustProvideSellerSKU'])]
        public ?string $barcode_instruction,
        #[StringEnumValidator(['ConsultHelpDocuments', 'NoAdditionalPrepRequired', 'SeePrepInstructionsList'])]
        public ?string $prep_guidance,
        #[StringArrayEnumValidator(AmazonEnums::PREP_INSTRUCTIONS)]
        public ?array $prep_instruction_list,

        public ?AmazonPrepFeesDetailsListSchema $amazon_prep_fees_details_list,
    ) {
    }
}
