<?php

namespace Jasara\AmznSPA\Data\Base;

use Jasara\AmznSPA\Data\Base\Validators\DataValidationException;
use Jasara\AmznSPA\Data\Base\Validators\Validator;

class DataValidator
{
    public function validate(object $data): void
    {
        $reflection = new \ReflectionClass($data);

        foreach ($reflection->getProperties() as $property) {
            if (! $property->isInitialized($data)) {
                continue;
            }

            $property->setAccessible(true);
            $property_value = $property->getValue($data);

            // If is iterable, validate all items that are data objects
            if (is_iterable($property_value)) {
                foreach ($property_value as $item) {
                    if ($item instanceof Data) {
                        $this->validate($item);
                    }
                }

                continue;
            }

            // If is data object, validate it recursively
            if ($property_value instanceof Data) {
                $this->validate($property_value);

                continue;
            }

            foreach ($this->getValidators($property) as $validator) {
                try {
                    $validator->validate($property_value);
                } catch (DataValidationException $e) {
                    throw new DataValidationException(
                        sprintf(
                            'Validation failed for property %s: %s on class %s',
                            $property->getName(),
                            $e->getMessage(),
                            $reflection->getName(),
                        )
                    );
                }
            }
        }
    }

    /** @return Validator[]  */
    private function getValidators(\ReflectionProperty $property): array
    {
        $validator_attributes = $property->getAttributes(Validator::class, \ReflectionAttribute::IS_INSTANCEOF);

        return array_map(
            fn ($attribute) => $attribute->newInstance(),
            $validator_attributes
        );
    }
}
