<?php

namespace Jasara\AmznSPA\DTOs;

use Spatie\DataTransferObject\DataTransferObject;

class AmznSPAConfig extends DataTransferObject
{
    public string $marketplace_id;

    public string $application_id;

    public ?string $lwa_refresh_token;

    public ?string $lwa_access_token;
}
