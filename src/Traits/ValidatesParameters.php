<?php

namespace Jasara\AmznSPA\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\Exceptions\InvalidParametersException;
use Spatie\DataTransferObject\DataTransferObject;

trait ValidatesParameters
{
    /* private function validateConfigProperties(AmznSPAConfig $config, array $required_properties)
    {
        foreach ($required_properties as $property) {
            if (! $config->isPropertySet($property)) {
                throw new InvalidParametersException(Str::of($property)->replace('_', ' ')->title() . ' is not set on config.');
            }
        }
    } */

    private function validateObjectProperties(object $object_to_validate, array $required_properties): void
    {
        foreach ($required_properties as $property) {
            if (! isset($object_to_validate->$property) || is_null($object_to_validate->$property)) {
                throw new InvalidParametersException(Str::of($property)->replace('_', ' ')->title() . ' is not set.');
            }
        }
    }

    private function validateDtoProperties(DataTransferObject $dto, array $required_properties): void
    {
        foreach ($required_properties as $property) {
            if (! isset($dto->$property) || is_null($dto->$property)) {
                throw new InvalidParametersException(Str::of($property)->replace('_', ' ')->title() . ' is not set.');
            }
        }
    }

    private function validateArrayParameters(array $array, array $required_parameters): void
    {
        foreach ($required_parameters as $parameter) {
            if (! Arr::get($array, $parameter)) {
                throw new InvalidParametersException(Str::of($parameter)->replace('_', ' ')->title() . ' was not passed as a parameter.');
            }
        }
    }

    private function validateStringEnum(string $string, string|array $allowed_values): void
    {
        if (is_string($allowed_values)) {
            if (! enum_exists($allowed_values)) {
                throw new \Exception('Only enum classes are allowed as string values for allowed_values.');
            }

            $allowed_values::tryFrom($string);

            if (! $allowed_values::tryFrom($string)) {
                $cases = collect($allowed_values::cases())->map(fn ($case) => $case->value)->toArray();

                throw new InvalidParametersException($string . ' is not in the list of allowed values: ' . implode(',', $cases));
            }

            return;
        }

        if (! in_array($string, $allowed_values)) {
            throw new InvalidParametersException($string . ' is not in the list of allowed values: ' . implode(',', $allowed_values));
        }
    }

    private function validateIsArrayOfStrings(array $array, ?array $allowed_values = null): void
    {
        if (Arr::isAssoc($array)) {
            throw new InvalidParametersException('Arrays of strings must not be associative arrays (they must be sequential).');
        }

        foreach ($array as $value) {
            if (! is_string($value)) {
                throw new InvalidParametersException('There is an invalid value in the array, the array can only contain strings.');
            }
            if (is_array($allowed_values)) {
                $this->validateStringEnum($value, $allowed_values);
            }
        }
    }
}
