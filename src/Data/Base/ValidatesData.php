<?php

namespace Jasara\AmznSPA\Data\Base;

use Jasara\AmznSPA\Data\Base\Validators\Validator;

trait ValidatesData
{
    private static function validateParameters(object $data): void
    {
        $reflection = new \ReflectionClass($data);

        foreach ($reflection->getProperties() as $property) {
            if (!$property->isInitialized($data)) {
                continue;
            }

            $property->setAccessible(true);
            $property_value = $property->getValue($data);

            // If is iterable, validate all items that are data objects
            if (is_iterable($property_value)) {
                foreach ($property_value as $item) {
                    if ($item instanceof Data) {
                        self::validateParameters($item);
                    }
                }

                continue;
            }

            // If is data object, validate it recursively
            if ($property_value instanceof Data) {
                self::validateParameters($property_value);

                continue;
            }

            foreach (self::getValidators($property) as $validator) {
                $validator->validate($property_value);
            }
        }
    }

    /** @return Validator[]  */
    private static function getValidators(\ReflectionProperty $property): array
    {
        $validator_attributes = $property->getAttributes(Validator::class, \ReflectionAttribute::IS_INSTANCEOF);

        return array_map(
            fn ($attribute) => $attribute->newInstance(),
            $validator_attributes
        );
    }
}
