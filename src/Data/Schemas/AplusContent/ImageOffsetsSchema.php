<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ImageOffsetsSchema extends BaseSchema
{
    public function __construct(
        public ?IntegerWithUnitsSchema $x = null,
        public ?IntegerWithUnitsSchema $y = null,
    ) {}
}
