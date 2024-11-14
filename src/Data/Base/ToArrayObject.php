<?php

namespace Jasara\AmznSPA\Data\Base;

use BackedEnum;
use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Jasara\AmznSPA\Contracts\PascalCaseRequestContract;
use Jasara\AmznSPA\Contracts\SnakeCaseRequestContract;
use Jasara\AmznSPA\Data\Base\Mappers\Mapper;

trait ToArrayObject
{
    public function toArrayObject($class = null, $case = 'camel'): \ArrayObject
    {
        $class = $class ?: $this;
        $reflection = new \ReflectionClass($class);

        if ($class instanceof PascalCaseRequestContract) {
            $case = 'pascal';
        }
        if ($class instanceof SnakeCaseRequestContract) {
            $case = 'snake';
        }

        $properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);

        $data = [];
        foreach ($properties as $property) {
            if ($property->isStatic()) {
                continue; // @codeCoverageIgnore
            }

            $data_key = $this->convertCase($property, $case);
            $data[$data_key] = $this->mapPropertyValue($case, $property, $property->getValue($class));
        }

        return new \ArrayObject(array_filter($data, function ($value) {
            return ! is_null($value);
        }));
    }

    private function mapPropertyValue(
        string $case,
        \ReflectionProperty $property,
        mixed $value,
    ): mixed {
        $has_mapper = (bool) count($property->getAttributes(Mapper::class, \ReflectionAttribute::IS_INSTANCEOF));

        return match (true) {
            $has_mapper => $this->mapWithMapper($property, $value),
            $value instanceof Data => $this->mapWithData($case, $value),
            $value instanceof TypedCollection => $value->toArrayObject(case: $case),
            $value instanceof Collection => $this->mapWithCollection($case, $value),
            $value instanceof CarbonImmutable => $this->mapWithCarbonImmutable($value),
            $value instanceof BackedEnum => $value->value,
            default => $value,
        };
    }

    private function mapWithMapper(\ReflectionProperty $property, mixed $value): mixed
    {
        $mapper = $property->getAttributes(Mapper::class, \ReflectionAttribute::IS_INSTANCEOF)[0]->newInstance();

        return $mapper->map($value);
    }

    private function mapWithData(string $case, Data $value): \ArrayObject
    {
        return $this->toArrayObject($value, $case);
    }

    private function mapWithCollection(string $case, Collection $value): array
    {
        return $value->map(function ($item) use ($case) {
            return match (true) {
                $item instanceof TypedCollection => $item->toArrayObject(case: $case),
                $item instanceof Collection => $item->toArrayObject(),
                $item instanceof Data => $item->toArrayObject(case: $case),
                $item instanceof BackedEnum => $item->value,
                default => $item,
            };
        })->toArray();
    }

    private function mapWithCarbonImmutable(CarbonImmutable $value): string
    {
        return $value->tz('UTC')->format('Y-m-d\TH:i:s\Z');
    }

    private function convertCase(
        \ReflectionProperty $property,
        string $case,
    ): string {
        return match ($case) {
            'camel' => Str::of($property->getName())->camel(),
            'pascal' => Str::of($property->getName())->studly()
                ->replace('Asin', 'ASIN')
                ->replace('Sku', 'SKU'),
            'snake' => Str::of($property->getName())->snake(),
            default => throw new \InvalidArgumentException('Invalid case provided'),
        };
    }
}
