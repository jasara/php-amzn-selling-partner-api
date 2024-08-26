<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OperationSchema extends BaseSchema
{
    public function __construct(
        #[RuleValidator(['min:1', 'max:1024'])]
        public string $operation,
        #[RuleValidator(['min:36', 'max:38'])]
        public string $operation_id,
        public OperationProblemSchemaList $operation_problems,
        public OperationStatus $operation_status,
    ) {
    }
}
