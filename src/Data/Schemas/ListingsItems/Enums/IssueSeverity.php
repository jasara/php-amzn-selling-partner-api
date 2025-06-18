<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems\Enums;

enum IssueSeverity: string
{
    case WARNING = 'WARNING';
    case ERROR = 'ERROR';
}