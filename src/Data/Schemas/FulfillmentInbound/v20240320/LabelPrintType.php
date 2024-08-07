<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum LabelPrintType: string
{
    case StandardFormat = 'STANDARD_FORMAT';
    case ThermalPrinting = 'THERMAL_PRINTING';
}
