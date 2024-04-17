<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<LabelFormatOptionSchema>
 */
class AvailableFormatOptionsForLabelListSchema extends TypedCollection
{
    protected string $item_class = LabelFormatOptionSchema::class;
}
