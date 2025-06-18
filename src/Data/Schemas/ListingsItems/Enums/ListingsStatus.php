<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems\Enums;

enum ListingsStatus: string
{
    case BUYABLE = 'BUYABLE';
    case DISCOVERABLE = 'DISCOVERABLE';
}