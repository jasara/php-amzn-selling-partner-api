<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ASINInboundGuidanceSchema extends DataTransferObject
{
    public string $asin;

    #[StringEnumValidator(['InboundNotRecommended', 'InboundOK'])]
    public string $inbound_guidance;

    #[StringArrayEnumValidator(['SlowMovingASIN', 'NoApplicableGuidance'])]
    public ?array $guidance_reason_list;
}
