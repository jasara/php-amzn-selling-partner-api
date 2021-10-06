<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FbaInventory;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ResearchingQuantityEntrySchema extends DataTransferObject
{
    #[StringEnumValidator(['researchingQuantityInShortTerm', 'researchingQuantityInMidTerm', 'researchingQuantityInLongTerm'])]
    public string $name;

    public int $quantity;
}
