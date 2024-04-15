<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ItemOfferByMarketplaceSchema extends DataTransferObject
{
    public string $marketplace_id;

    #[StringEnumValidator(['B2C', 'B2B'])]
    public string $offer_type;

    public MoneySchema $price;

    public ?PointsSchema $points;
}
