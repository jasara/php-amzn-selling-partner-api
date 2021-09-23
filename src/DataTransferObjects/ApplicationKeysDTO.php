<?php

namespace Jasara\AmznSPA\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class ApplicationKeysDTO extends DataTransferObject
{
    public string $application_id;

    public ?string $aws_access_key;

    public ?string $aws_secret_key;

    public ?string $lwa_client_id;

    public ?string $lwa_client_secret;
}
