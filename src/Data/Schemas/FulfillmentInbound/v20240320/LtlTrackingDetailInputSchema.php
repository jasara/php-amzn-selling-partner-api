<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LtlTrackingDetailInputSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['min:1', 'max:1024'])]
        public ?string $bill_of_lading_number,
        public array $freight_bill_number,
    ) {
    }
}
