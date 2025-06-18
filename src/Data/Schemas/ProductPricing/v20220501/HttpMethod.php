<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

enum HttpMethod: string
{
    case GET = 'GET';
    case PUT = 'PUT';
    case PATCH = 'PATCH';
    case DELETE = 'DELETE';
    case POST = 'POST';
}