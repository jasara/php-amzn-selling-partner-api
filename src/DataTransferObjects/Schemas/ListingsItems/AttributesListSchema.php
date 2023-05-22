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
        $array_object = new ArrayObject();
        $attribute_names = $this->pluck('attribute_name')->unique()->toArray();

        foreach ($attribute_names as $attribute_name) {
            $attribute_schemas = $this->filter(fn (AttributeSchema $attribute) => $attribute->attribute_name === $attribute_name);
            $attribute_values = [];
            foreach ($attribute_schemas as $attribute_schema) {
                $attribute_values[] = array_filter([
                    'value' => $attribute_schema->value,
                    'language_tag' => $attribute_schema->language_tag,
                    'marketplace_id' => $attribute_schema->marketplace_id,
                ]);
            }

            $array_object->offsetSet($attribute_name, $attribute_values);
        }

        return $array_object;
    }
}
