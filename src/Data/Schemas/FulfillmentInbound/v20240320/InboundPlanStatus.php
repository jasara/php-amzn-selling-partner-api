<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum InboundPlanStatus: string
{
    case Active = 'ACTIVE';
    case Voided = 'VOIDED';
    case Shipped = 'SHIPPED';
    case Errored = 'ERRORED';
}
