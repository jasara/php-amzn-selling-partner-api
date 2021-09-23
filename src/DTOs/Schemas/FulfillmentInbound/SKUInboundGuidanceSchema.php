<?php

namespace Jasara\AmznSPA\DTOs\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\DTOs\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\DTOs\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class SKUInboundGuidanceSchema extends DataTransferObject
{
    public string $seller_sku;

    public string $asin;

    #[StringEnumValidator(['InboundNotRecommended', 'InboundOK'])]
    public string $inbound_guidance;

    #[StringArrayEnumValidator(['SlowMovingASIN', 'NoApplicableGuidance'])]
    public array $guidance_reason_list;
}
