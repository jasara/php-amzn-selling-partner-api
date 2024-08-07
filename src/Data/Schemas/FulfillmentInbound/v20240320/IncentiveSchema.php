<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class IncentiveSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['min:1', 'max:1024'])]
        public string $description,
        #[RuleValidator(['min:1', 'max:1024'])]
        public string $target,
        public IncentiveType $type,
        public CurrencySchema $value,
    ) {
    }
}
