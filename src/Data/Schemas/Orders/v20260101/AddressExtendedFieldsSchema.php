<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Orders\v20260101;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class AddressExtendedFieldsSchema extends BaseSchema
{
    public function __construct(
        public ?string $street_name,
        public ?string $street_number,
        public ?string $complement,
        public ?string $neighborhood,
    ) {
    }
}
