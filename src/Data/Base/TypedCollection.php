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
    public const ITEM_CLASS = 'defined_by_child_class';

    public function __construct(
        object|array ...$items,
    ) {
        if (! class_exists(static::ITEM_CLASS)) {
            throw new \InvalidArgumentException('Invalid item class: ' . static::ITEM_CLASS);
        }

        $items = Arr::flatten($items, 1);

        $items = array_map(function ($item) {
            if (is_a($item, static::ITEM_CLASS) || ! is_a(static::ITEM_CLASS, Data::class, true)) {
                return $item;
            }

            try {
                return static::ITEM_CLASS::from($item);
            } catch (\Throwable $e) {
                throw new \UnexpectedValueException('Item data cannot be converted to ' . static::ITEM_CLASS . ': ' . $e->getMessage());
            }
        }, $items);

        parent::__construct($items);

        $this->ensure(static::ITEM_CLASS);
    }
}
