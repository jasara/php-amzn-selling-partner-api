<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RegulatedInformationSchema extends BaseSchema
{
    public function __construct(
        public FieldListScehma $fields,
    ) {
    }
}