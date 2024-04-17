<?php

namespace Jasara\AmznSPA\Data\Base;

class Data
{
    use ToArrayObject;
    use BuildsData;

    public static function from(array $payload): static
    {
        $data = self::buildObject(
            static::class,
            $payload,
        );

        self::validateParameters($data);

        return $data;
    }

    private static function validateParameters(object $data): void
    {
    }
}
