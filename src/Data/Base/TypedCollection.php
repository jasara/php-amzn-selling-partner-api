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
    protected string $item_class;

    public function __construct(
        object|array ...$items,
    ) {
        if (!class_exists($this->item_class)) {
            throw new \InvalidArgumentException("Invalid item class: {$this->item_class}");
        }

        parent::__construct(Arr::flatten($items, 1));

        $this->ensure($this->item_class);
    }
}
