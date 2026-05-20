<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\AplusContent;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ImageComponentSchema extends BaseSchema
{
    public function __construct(
        public ?string $upload_destination_id = null,
        public ?ImageCropSpecificationSchema $image_crop_specification = null,
        public ?string $alt_text = null,
    ) {}
}
