<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ItemOfferByMarketplaceSchema extends DataTransferObject
{
    public string $marketplace_id;

    #[StringEnumValidator(['B2C', 'B2B'])]
    public string $offer_type;

    public MoneySchema $price;

    public ?PointsSchema $points;
}
