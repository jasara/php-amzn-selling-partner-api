<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class MskuQuantitySchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['min:1', 'max:40'])]
        public string $msku,
        #[RuleValidator(['min:1', 'max:10000'])]
        public int $quantity,
    ) {
    }
}
