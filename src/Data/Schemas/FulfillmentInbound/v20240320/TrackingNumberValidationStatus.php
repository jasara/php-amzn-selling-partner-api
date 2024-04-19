<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum TrackingNumberValidationStatus: string
{
    case Validated = 'VALIDATED';
    case NotValidated = 'NOT_VALIDATED';
}
