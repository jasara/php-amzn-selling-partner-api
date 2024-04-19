<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum PlacementOptionStatus: string
{
    case Offered = 'OFFERED';
    case Accepted = 'ACCEPTED';
    case Expired = 'EXPIRED';
}
