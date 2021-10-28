<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class FulfillmentOutboundResource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/fba/outbound/2020-07-01/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }
}
