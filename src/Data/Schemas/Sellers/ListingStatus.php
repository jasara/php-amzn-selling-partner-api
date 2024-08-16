<?php

namespace Jasara\AmznSPA\Data\Schemas\Sellers;

enum ListingStatus: string
{
    case Active = 'ACTIVE';
    case Inactive = 'INACTIVE';
}
