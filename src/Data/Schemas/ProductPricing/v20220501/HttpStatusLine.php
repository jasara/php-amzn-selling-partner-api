<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class HttpStatusLine extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['integer', 'min:100', 'max:599'])]
        public ?int $status_code = null,
        public ?string $reason_phrase = null,
    ) {
    }
}