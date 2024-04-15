<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Illuminate\Support\Collection;

class AttributesListSchema extends Collection
{
    public function offsetGet($key): AttributeSchema
    {
        return parent::offsetGet($key);
    }

    public function toArrayObject(): \ArrayObject
    {
        $array_object = new \ArrayObject();
        $attribute_names = $this->pluck('name')->unique()->toArray();

        foreach ($attribute_names as $attribute_name) {
            /** @var Collection<int, AttributeSchema> */
            $attribute_schemas = $this->filter(fn (AttributeSchema $attribute) => $attribute->name === $attribute_name);
            $attribute_values = [];
            foreach ($attribute_schemas as $attribute_schema) {
                $attribute_values[] = $this->getAttributeProperties($attribute_schema);
            }

            $array_object->offsetSet($attribute_name, $attribute_values);
        }

        return $array_object;
    }

    private function getAttributeProperties(AttributeSchema|AttributePropertySchema $schema): array
    {
        $attribute_properties = [];
        foreach ($schema->properties as $attribute_property) {
            if ($attribute_property->properties) {
                $attribute_properties[$attribute_property->name] = $this->getAttributeProperties($attribute_property);

                continue;
            }
            $attribute_properties[$attribute_property->name] = $attribute_property->value;
        }

        return $attribute_properties;
    }
}
