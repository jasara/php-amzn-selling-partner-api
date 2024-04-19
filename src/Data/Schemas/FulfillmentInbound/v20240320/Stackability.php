<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum Stackability: string
{
    case Stackable = 'STACKABLE';
    case NonStackable = 'NON_STACKABLE';
}
