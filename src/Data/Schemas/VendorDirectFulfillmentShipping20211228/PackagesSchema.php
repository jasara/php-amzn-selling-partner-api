<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<PackageSchema>
 */
class PackagesSchema extends TypedCollection
{
    public const ITEM_CLASS = PackageSchema::class;
}
