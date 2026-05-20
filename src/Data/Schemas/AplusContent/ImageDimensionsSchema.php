<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ImageDimensionsSchema extends BaseSchema
{
    public function __construct(
        public ?IntegerWithUnitsSchema $width = null,
        public ?IntegerWithUnitsSchema $height = null,
    ) {}
}
