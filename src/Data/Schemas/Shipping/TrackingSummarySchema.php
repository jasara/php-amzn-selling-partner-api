<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TrackingSummarySchema extends BaseSchema
{
    public function __construct(
        #[MaxLengthValidator(60)]
        public ?string $status,
    ) {
    }
}
