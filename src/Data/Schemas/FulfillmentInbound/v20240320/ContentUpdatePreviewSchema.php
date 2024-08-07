<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ContentUpdatePreviewSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['size:38'])]
        public string $content_update_preview_id,
        #[CarbonFromStringCaster]
        public CarbonImmutable $expiration,
        public RequestedUpdatesSchema $requested_updates,
        public TransportationOptionSchema $transportation_option,
    ) {
    }
}
