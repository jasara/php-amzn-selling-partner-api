<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

if (! function_exists('array_keys_to_snake')) { // @codeCoverageIgnore
    function array_keys_to_snake(array $array): array
    {
        $snakecased_array = [];
        foreach ($array as $key => $value) {
            if (is_string($key)) {
                preg_match_all('/[A-Z][a-z]+|[a-z]+|[A-Z]+|[0-9]+/', $key, $matches);
                $result = $matches[0];
                foreach ($result as &$match) {
                    $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
                }

                $key = Str::snake(implode('_', $result));
            }
            if (is_array($value)) {
                $value = array_keys_to_snake($value);
            }
            if (is_a($value, Collection::class)) {
                $value = array_keys_to_snake($value->toArray());
            }
            $snakecased_array[$key] = $value;
        }

        return $snakecased_array;
    }
}
