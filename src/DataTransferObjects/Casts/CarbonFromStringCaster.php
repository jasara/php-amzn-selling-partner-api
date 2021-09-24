<?php

namespace Jasara\AmznSPA\DataTransferObjects\Casts;

use Carbon\CarbonImmutable;
use Spatie\DataTransferObject\Caster;

class CarbonFromStringCaster implements Caster
{
    /**
     * @param int|mixed $value
     *
     * @return mixed
     */
    public function cast(mixed $value): CarbonImmutable
    {
        return CarbonImmutable::parse($value);
    }
}
