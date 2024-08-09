<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum PrepOwner: string
{
    case Amazon = 'AMAZON';
    case Seller = 'SELLER';
    case None = 'NONE';
}
