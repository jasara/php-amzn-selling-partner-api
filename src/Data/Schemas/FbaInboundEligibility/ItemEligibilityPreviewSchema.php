<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInboundEligibility;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemEligibilityPreviewSchema extends BaseSchema
{
    public function __construct(
        public string $asin,
        public ?string $marketplace_id,
        #[StringEnumValidator(['INBOUND', 'COMMINGLING'])]
        public string $program,
        public bool $is_eligible_for_program,
        #[StringArrayEnumValidator(AmazonEnums::IN_ELIGIBILITY_REASON_LIST)]
        public ?array $ineligibility_reason_list,
    ) {
    }
}
