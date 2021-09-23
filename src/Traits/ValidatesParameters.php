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

    private function validateObjectProperties(object $object_to_validate, array $required_properties)
    {
        foreach ($required_properties as $property) {
            if (! isset($object_to_validate->$property) || is_null($object_to_validate->$property)) {
                throw new InvalidParametersException(Str::of($property)->replace('_', ' ')->title() . ' is not set.');
            }
        }
    }

    private function validateDtoProperties(DataTransferObject $dto, array $required_properties)
    {
        foreach ($required_properties as $property) {
            if (! isset($dto->$property) || is_null($dto->$property)) {
                throw new InvalidParametersException(Str::of($property)->replace('_', ' ')->title() . ' is not set.');
            }
        }
    }

    private function validateArrayParameters(array $array, array $required_parameters)
    {
        foreach ($required_parameters as $parameter) {
            if (! Arr::get($array, $parameter)) {
                throw new InvalidParametersException(Str::of($parameter)->replace('_', ' ')->title() . ' was not passed as a parameter.');
            }
        }
    }

    private function validateStringEnum(string $string, array $allowed_values)
    {
        if (! in_array($string, $allowed_values)) {
            throw new InvalidParametersException($string . ' is not in the list of allowed values: ' . implode(',', $allowed_values));
        }
    }

    private function validateIsArrayOfStrings(array $array)
    {
        foreach ($array as $value) {
            if (! is_string($value)) {
                throw new InvalidParametersException('There is an invalid value in the array, the array can only contain strings.');
            }
        }
    }
}
