<?php

namespace Jasara\AmznSPA\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\Exceptions\InvalidParametersException;

trait ValidatesParameters
{
    private function validateConfigParameters(AmznSPAConfig $config, array $required_parameters)
    {
        foreach ($required_parameters as $parameter) {
            if (! isset($config->$parameter) || ! $config->$parameter) {
                throw new InvalidParametersException(Str::title($parameter) . ' is not set on config.');
            }
        }
    }

    private function validateArrayParameters(array $array, array $required_parameters)
    {
        foreach ($required_parameters as $parameter) {
            if (! Arr::get($array, $parameter)) {
                throw new InvalidParametersException(Str::title($parameter) . ' was not passed as a parameter.');
            }
        }
    }
}
