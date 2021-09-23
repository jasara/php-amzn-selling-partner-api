<?php

namespace Jasara\AmznSPA\DataTransferObjects\Casts;

use Carbon\CarbonImmutable;
use Spatie\DataTransferObject\Caster;

class CarbonFromSecondsCaster implements Caster
{
    /**
     * @param int|mixed $value
     *
     * @return mixed
     */
    public function cast(mixed $value): CarbonImmutable
    {
        if (is_object($value) && get_class($value) === CarbonImmutable::class) {
            return $value;
        }

        return CarbonImmutable::now()->addSeconds($value);
    }
}
