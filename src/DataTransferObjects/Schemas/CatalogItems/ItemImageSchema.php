<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ItemImageSchema extends DataTransferObject
{
    #[StringEnumValidator(AmazonEnums::IMAGE_VARIANTS)]
    public string $variant;

    public string $link;

    public int $height;

    public int $width;
}
