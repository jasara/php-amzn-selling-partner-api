<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests;

use ArrayObject;
use Carbon\CarbonImmutable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Jasara\AmznSPA\Contracts\PascalCaseRequestContract;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonToDateStringMapper;
use ReflectionClass;
use ReflectionProperty;
use Spatie\DataTransferObject\DataTransferObject;

class BaseRequest extends DataTransferObject
{
    public function toArrayObject($class = null, $case_function = 'camelCase'): ArrayObject
    {
        $class = $class ?: $this;
        $reflection = new ReflectionClass($class);

        if ($class instanceof PascalCaseRequestContract) {
            $case_function = 'pascalCase';
        }

        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        $data = [];
        foreach ($properties as $property) {
            if ($property->isStatic()) {
                continue; // @codeCoverageIgnore
            }

            $value = $property->getValue($class);

            if ($value instanceof DataTransferObject) {
                $data[$this->$case_function($property)] = $this->toArrayObject($value, $case_function);
            } elseif ($value instanceof Collection) {
                $data[$this->$case_function($property)] = $value->map(function ($item) use ($case_function) {
                    return $this->toArrayObject($item, $case_function);
                })->toArray();
            } elseif ($value instanceof CarbonImmutable) {
                $to_date_string = (bool) count($property->getAttributes(CarbonToDateStringMapper::class));
                if ($to_date_string) {
                    $data[$this->$case_function($property)] = $value->tz('UTC')->toDateString();
                } else {
                    $data[$this->$case_function($property)] = $value->tz('UTC')->format('Y-m-d\TH:i:s\Z');
                }
            } else {
                $data[$this->$case_function($property)] = $value;
            }
        }

        Arr::forget($data, ['ExceptKeys', 'OnlyKeys']);

        return new ArrayObject(array_filter($data, function ($value) {
            return ! is_null($value);
        }));
    }

    private function camelCase(ReflectionProperty $property): string
    {
        return Str::of($property->getName())->camel();
    }

    private function pascalCase(ReflectionProperty $property): string
    {
        return Str::of($property->getName())->studly()
            ->replace('Asin', 'ASIN')
            ->replace('Sku', 'SKU');
    }
}
