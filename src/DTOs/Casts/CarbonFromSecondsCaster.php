<?php

namespace Jasara\AmznSPA\DTOs\Casts;

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
        return CarbonImmutable::now()->addSeconds(3600);
    }
}
