<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TaxDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?CurrencySchema $declared_value,
        #[RuleValidator(['min:1', 'max:1024'])]
        public ?string $hsn_code,
        public TaxRateListSchema $tax_rates,
    ) {
    }
}
