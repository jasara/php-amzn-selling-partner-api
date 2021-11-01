<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FbaInboundEligibility;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ItemEligibilityPreviewSchema extends DataTransferObject
{
    public string $asin;

    public ?string $marketplace_id;

    #[StringEnumValidator(['INBOUND', 'COMMINGLING'])]
    public string $program;

    public bool $is_eligible_for_program;

    #[StringArrayEnumValidator(AmazonEnums::IN_ELIGIBILITY_REASON_LIST)]
    public ?array $ineligibility_reason_list;
}
