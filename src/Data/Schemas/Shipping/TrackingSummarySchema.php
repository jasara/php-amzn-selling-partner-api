<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\DataTransferObject;

class TrackingSummarySchema extends DataTransferObject
{
    #[MaxLengthValidator(60)]
    public ?string $status;
}
