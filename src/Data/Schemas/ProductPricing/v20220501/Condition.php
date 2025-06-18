<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

enum Condition: string
{
    case NEW = 'New';
    case USED = 'Used';
    case COLLECTIBLE = 'Collectible';
    case REFURBISHED = 'Refurbished';
    case CLUB = 'Club';
}