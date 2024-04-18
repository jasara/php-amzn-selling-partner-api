<?php

namespace Jasara\AmznSPA\Data\Base;

use Illuminate\Contracts\Support\Arrayable;
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

            if ($value instanceof Arrayable) {
                $value = $value->toArray();
            }

            if ($value instanceof Collection) {
                $value = $value->map(function (mixed $item) {
                    if ($item instanceof Arrayable) {
                        return $item->toArray();
                    }

                    return $item;
                })->toArray();
            }

            $data[$property->getName()] = $value;
        }

        return $data;
    }
}
