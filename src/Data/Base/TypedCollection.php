<?php

namespace Jasara\AmznSPA\Data\Base;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

/**
 * @template TValue
 *
 * @template-extends Collection<int, TValue>
 */
class TypedCollection extends Collection
{
    public const string ITEM_CLASS = 'defined_by_child_class';

    public function __construct(
        object|array ...$items,
    ) {
        if (!class_exists(static::ITEM_CLASS)) {
            throw new \InvalidArgumentException('Invalid item class: '.static::ITEM_CLASS);
        }

        parent::__construct(Arr::flatten($items, 1));

        $this->ensure(static::ITEM_CLASS);
    }
}
