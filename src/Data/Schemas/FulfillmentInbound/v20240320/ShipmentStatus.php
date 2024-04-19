<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum ShipmentStatus: string
{
    case Abandoned = 'ABANDONED';
    case Cancelled = 'CANCELLED';
    case CheckedIn = 'CHECKED_IN';
    case Closed = 'CLOSED';
    case Deleted = 'DELETED';
    case Delivered = 'DELIVERED';
    case InTransit = 'IN_TRANSIT';
    case Mixed = 'MIXED';
    case ReadyToShip = 'READY_TO_SHIP';
    case Receiving = 'RECEIVING';
    case Shipped = 'SHIPPED';
    case Working = 'WORKING';
}
