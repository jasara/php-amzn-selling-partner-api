<?php

namespace Jasara\AmznSPA\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\Exceptions\InvalidParametersException;
use Spatie\DataTransferObject\DataTransferObject;

trait ValidatesParameters
{
    private function validateConfigParameters(AmznSPAConfig $config, array $required_parameters)
    {
        foreach ($required_parameters as $parameter) {
            if (! $config->isPropertySet($parameter)) {
                throw new InvalidParametersException(Str::of($parameter)->replace('_', ' ')->title() . ' is not set on config.');
            }
        }
    }

    private function validateDtoProperties(DataTransferObject $dto, array $required_parameters)
    {
        foreach ($required_parameters as $parameter) {
            if (! isset($dto->$parameter) || is_null($dto->$parameter)) {
                throw new InvalidParametersException(Str::of($parameter)->replace('_', ' ')->title() . ' is not set.');
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
}
