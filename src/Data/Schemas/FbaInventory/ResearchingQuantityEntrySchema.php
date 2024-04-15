<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ResearchingQuantityEntrySchema extends DataTransferObject
{
    #[StringEnumValidator(['researchingQuantityInShortTerm', 'researchingQuantityInMidTerm', 'researchingQuantityInLongTerm'])]
    public string $name;

    public int $quantity;
}
