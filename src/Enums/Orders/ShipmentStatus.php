<?php

namespace Jasara\AmznSPA\Enums\Orders;

enum ShipmentStatus: string
{
    case ReadyForPickup = 'ReadyForPickup';
    case PickedUp = 'PickedUp';
    case RefusedPickup = 'RefusedPickup';
}
