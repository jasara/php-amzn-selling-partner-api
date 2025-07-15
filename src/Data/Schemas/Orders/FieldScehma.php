<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FieldScehma extends BaseSchema
{
    public function __construct(
        public string $field_id,
        public string $field_label,
        public string $field_type,
        public string $field_value,
    ){
    }
}
