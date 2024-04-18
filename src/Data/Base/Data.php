<?php

namespace Jasara\AmznSPA\Data\Base;

use Illuminate\Contracts\Support\Arrayable;

class Data implements Arrayable
{
    use ToArrayObject;
    use ToArray;

    public static function from(mixed ...$payload): static
    {
        if (count($payload) && func_num_args() !== 0) {
            $payload = $payload[0];
        }

        $data = $payload instanceof static ? $payload : (new DataBuilder(static::class, $payload))->build();

        (new DataValidator)->validate($data);

        return $data;
    }
}
