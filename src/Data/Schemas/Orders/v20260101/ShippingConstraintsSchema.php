<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class ShippingConstraintsSchema extends BaseSchema
{
    public function __construct(
        public ?string $pallet_delivery,
        public ?string $cash_on_delivery,
        public ?string $signature_confirmation,
        public ?string $recipient_identity_verification,
        public ?string $recipient_age_verification,
    ) {
    }
}
