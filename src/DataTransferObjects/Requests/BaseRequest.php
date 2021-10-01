<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests;

use ArrayObject;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Jasara\AmznSPA\Contracts\PascalCaseRequestContract;
use Spatie\DataTransferObject\DataTransferObject;

class BaseRequest extends DataTransferObject
{
    public function toArrayObject($class = null, $case_function = 'camelCase'): ArrayObject
    {
        $class = $class ?: $this;

        if ($class instanceof PascalCaseRequestContract) {
            $case_function = 'pascalCase';
        }

        $data = [];
        foreach (get_object_vars($class ?: $this) as $property => $value) {
            if ($value instanceof DataTransferObject) {
                $data[$this->$case_function($property)] = $this->toArrayObject($value, $case_function);
            } elseif ($value instanceof Collection) {
                $data[$this->$case_function($property)] = $value->map(function ($item) use ($case_function) {
                    return $this->toArrayObject($item, $case_function);
                })->toArray();
            } else {
                $data[$this->$case_function($property)] = $value;
            }
        }

        Arr::forget($data, ['ExceptKeys', 'OnlyKeys']);

        return new ArrayObject(array_filter($data));
    }

    private function camelCase(string $string): string
    {
        return Str::of($string)->camel();
    }

    private function pascalCase(string $string): string
    {
        return Str::of($string)->studly()
            ->replace('Asin', 'ASIN')
            ->replace('Sku', 'SKU');
    }
}
