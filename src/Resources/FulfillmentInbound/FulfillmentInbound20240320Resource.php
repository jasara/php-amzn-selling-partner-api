<?php

namespace Jasara\AmznSPA\Resources\FulfillmentInbound;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class FulfillmentInbound20240320Resource implements ResourceContract
{
    use ValidatesParameters;
    public const BASE_PATH = '/inbound/fba/2024-03-20/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }
}
