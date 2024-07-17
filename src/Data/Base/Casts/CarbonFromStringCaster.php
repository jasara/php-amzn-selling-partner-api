<?php

namespace Jasara\AmznSPA\Data\Base\Casts;

use Carbon\CarbonImmutable;

#[\Attribute(\Attribute::TARGET_PARAMETER | \Attribute::TARGET_PROPERTY)]
class CarbonFromStringCaster implements Caster
{
    public function cast(mixed $value): ?CarbonImmutable
    {
        if (is_null($value)) {
            return null;
        }

        return CarbonImmutable::parse($value);
    }
}
