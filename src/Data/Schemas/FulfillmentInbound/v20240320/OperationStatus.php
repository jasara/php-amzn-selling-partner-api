<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum OperationStatus: string
{
    case Success = 'SUCCESS';
    case InProgress = 'IN_PROGRESS';
    case Failed = 'FAILED';
}
