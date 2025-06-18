<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

enum ListingsStatus: string
{
    case BUYABLE = 'BUYABLE';
    case DISCOVERABLE = 'DISCOVERABLE';
}