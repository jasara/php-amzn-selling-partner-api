<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum SortBy: string
{
    case LastUpdatedTime = 'LAST_UPDATED_TIME';
    case CreationTime = 'CREATION_TIME';
}
