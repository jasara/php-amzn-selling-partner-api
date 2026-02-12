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
            $property_value = $property->getValue($data);

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
