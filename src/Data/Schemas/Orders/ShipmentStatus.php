<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

enum ShipmentStatus: string
{
    case ReadyForPickup = 'ReadyForPickup';
    case PickedUp = 'PickedUp';
    case RefusedPickup = 'RefusedPickup';
}
