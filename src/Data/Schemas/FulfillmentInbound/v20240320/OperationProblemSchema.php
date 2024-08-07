<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OperationProblemSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['min:1', 'max:256'])]
        public string $code,
        #[RuleValidator(['min:0', 'max:8192'])]
        public ?string $details,
        #[RuleValidator(['min:1', 'max:2048'])]
        public string $message,
        #[RuleValidator(['min:1', 'max:1024'])]
        public string $severity,
    ) {
    }
}
