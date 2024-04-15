<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Spatie\DataTransferObject\DataTransferObject;

class ClassificationRefinementSchema extends DataTransferObject
{
    public int $number_of_results;

    public string $display_name;

    public string $classification_id;
}
