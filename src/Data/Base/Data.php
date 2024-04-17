<?php

namespace Jasara\AmznSPA\Data\Base;

class Data
{
    use ToArrayObject;
    use BuildsData;
    use ValidatesData;

    public static function from(mixed ...$payload): static
    {
        if (count($payload) && func_num_args() !== 0) {
            $payload = $payload[0];
        }

        $data = $payload instanceof static ? $payload : self::buildObject(static::class, $payload);

        self::validateParameters($data);

        return $data;
    }
}
