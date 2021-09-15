<?php

namespace Jasara\AmznSPA;

use Illuminate\Http\Client\Factory;

class AmznSPAConfig
{
    public Factory $http;

    public function __construct(
        public string $marketplace_id,
        public string $application_id,
        public ?string $redirect_url = null,
        public ?string $lwa_client_id = null,
        public ?string $lwa_client_secret = null,
        public ?string $lwa_refresh_token = null,
        public ?string $lwa_access_token = null,
    ) {
        $this->http = new Factory;
    }
}
