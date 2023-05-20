<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use ArrayObject;
use Illuminate\Support\Collection;

class AttributesListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): AttributeSchema
    {
        return parent::offsetGet($key);
    }

    public function toArrayObject(): ArrayObject
    {
        return new ArrayObject($this->mapWithKeys(function (AttributeSchema $attribute) {
            return [$attribute->attribute_name => [array_filter([
                'value' => $attribute->value,
                'language_tag' => $attribute->language_tag,
                'marketplace_id' => $attribute->marketplace_id,
            ])]];
        })->toArray());
    }
}
