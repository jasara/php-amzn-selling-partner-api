<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class SKUInboundGuidanceSchema extends DataTransferObject
{
    public string $seller_sku;

    public string $asin;

    #[StringEnumValidator(['InboundNotRecommended', 'InboundOK'])]
    public string $inbound_guidance;

    #[StringArrayEnumValidator(['SlowMovingASIN', 'NoApplicableGuidance'])]
    public ?array $guidance_reason_list;
}
