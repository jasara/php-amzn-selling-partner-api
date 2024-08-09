<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\ItemInputSchemaList;

class CreateInboundPlanRequest extends BaseRequest
{
    public function __construct(
        #[RuleValidator(['array', 'max:1'])]
        public array $destination_marketplaces,
        public ItemInputSchemaList $items,
        #[RuleValidator(['min:1', 'max:40'])]
        public ?string $name,
        public AddressSchema $source_address,
    ) {
    }
}
