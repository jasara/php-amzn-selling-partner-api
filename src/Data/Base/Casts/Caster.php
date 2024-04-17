<?php

namespace Jasara\AmznSPA\Data\Base\Casts;

interface Caster
{
    public function cast(mixed $value): mixed;
}
