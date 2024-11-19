<?php

namespace Jasara\AmznSPA\Data\Base\Mappers;

use Carbon\CarbonInterface;

#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::IS_REPEATABLE)]
class CarbonToDateStringMapper implements Mapper
{
    public function map(mixed $value): ?string
    {
        if (is_null($value)) {
            return null;
        }

        if (! ($value instanceof CarbonInterface)) {
            throw new \InvalidArgumentException('Value must be an instance of Carbon');
        }

        return $value->toDateString();
    }
}
