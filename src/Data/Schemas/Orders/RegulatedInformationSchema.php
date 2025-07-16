<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Base\TypedCollection;

class RegulatedInformationSchema extends TypedCollection
{
    public function __construct(
        public FieldListScehma $fields,
    ) {
    }
}