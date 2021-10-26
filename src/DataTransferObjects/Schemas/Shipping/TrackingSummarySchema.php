<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\DataTransferObject;

class TrackingSummarySchema extends DataTransferObject
{
    #[MaxLengthValidator(60)]
    public ?string $status;
}
