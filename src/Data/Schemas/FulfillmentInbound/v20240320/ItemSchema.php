<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['min:1', 'max:10'])]
        public string $asin,
        #[RuleValidator(['date_format:Y-m-d'])]
        public ?string $expiration,
        #[RuleValidator(['min:1', 'max:10'])]
        public string $fnsku,
        public LabelOwner $label_owner,
        #[RuleValidator(['min:1', 'max:256'])]
        public ?string $manufacturing_lot_code,
        #[RuleValidator(['min:1', 'max:40'])]
        public string $msku,
        public PrepInstructionSchemaList $prep_instructions,
        #[RuleValidator(['integer', 'min:1', 'max:10000'])]
        public int $quantity,
    ) {
    }
}
