<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ResearchingQuantityEntrySchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(['researchingQuantityInShortTerm', 'researchingQuantityInMidTerm', 'researchingQuantityInLongTerm'])]
        public string $name,
        public int $quantity,
    ) {
    }
}
