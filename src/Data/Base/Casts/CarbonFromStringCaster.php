<?php

namespace Jasara\AmznSPA\Data\Base\Casts;

use Carbon\CarbonImmutable;

class CarbonFromStringCaster implements Caster
{
    public function cast(mixed $value): CarbonImmutable
    {
        return CarbonImmutable::parse($value);
    }
}
