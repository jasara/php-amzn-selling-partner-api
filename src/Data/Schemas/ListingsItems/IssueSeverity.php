<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

enum IssueSeverity: string
{
    case WARNING = 'WARNING';
    case ERROR = 'ERROR';
}