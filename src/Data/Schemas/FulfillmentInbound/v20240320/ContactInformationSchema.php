<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ContactInformationSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['min:1', 'max:1024'])]
        public ?string $email,
        #[RuleValidator(['min:1', 'max:1024'])]
        public ?string $name,
        #[RuleValidator(['min:1', 'max:20'])]
        public ?string $phone_number,
    ) {
    }
}
