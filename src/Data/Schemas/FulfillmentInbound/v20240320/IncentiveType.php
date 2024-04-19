<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum IncentiveType: string
{
    case Fee = 'FEE';
    case Discount = 'DISCOUNT';
}
