<?php

namespace Jasara\AmznSPA\Data\Base\Mappers;

interface Mapper
{
    public function map(mixed $value): mixed;
}
