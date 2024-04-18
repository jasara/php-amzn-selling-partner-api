<?php

namespace Jasara\AmznSPA\Data;

class ApplicationKeys
{
    public function __construct(
        public string $application_id,
        public ?string $aws_access_key = null,
        public ?string $aws_secret_key = null,
        public ?string $lwa_client_id = null,
        public ?string $lwa_client_secret = null,
    ) {
    }
}
