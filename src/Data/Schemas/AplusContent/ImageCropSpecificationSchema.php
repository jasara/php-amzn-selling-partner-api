<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ImageCropSpecificationSchema extends BaseSchema
{
    public function __construct(
        public ?ImageDimensionsSchema $size = null,
        public ?ImageOffsetsSchema $offset = null,
    ) {}
}
