<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum LabelOwner: string
{
    case Amazon = 'AMAZON';
    case Seller = 'SELLER';
}
