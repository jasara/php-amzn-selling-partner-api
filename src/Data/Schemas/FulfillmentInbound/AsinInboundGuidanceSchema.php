<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Jasara\AmznSPA\Data\Base\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AsinInboundGuidanceSchema extends BaseSchema
{
    public function __construct(
        public string $asin,
        #[StringEnumValidator(['InboundNotRecommended', 'InboundOK'])]
        public string $inbound_guidance,
        #[StringArrayEnumValidator(['SlowMovingASIN', 'NoApplicableGuidance'])]
        public ?array $guidance_reason_list,
    ) {
    }
}
