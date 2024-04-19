<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum BoxContentInformationSource: string
{
    case BoxContentProvided = 'BOX_CONTENT_PROVIDED';
    case ManualProcess = 'MANUAL_PROCESS';
    case Barcode2D = 'BARCODE_2D';
}
