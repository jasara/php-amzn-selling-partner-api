<?php

namespace Jasara\AmznSPA\Data\Base;

use Illuminate\Support\Collection;
use ReflectionClass;
use ReflectionProperty;

trait ToArray
{
    public function toArray(): array
    {
        $class = new ReflectionClass(static::class);

        $data = [];
        foreach ($class->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            $value = $property->getValue($this);
            if ($value instanceof Collection) {
                $value = $value->map(fn ($item) => $item->toArray())->toArray();
            }

            $data[$property->getName()] = $value;
        }

        return $data;
    }
}
