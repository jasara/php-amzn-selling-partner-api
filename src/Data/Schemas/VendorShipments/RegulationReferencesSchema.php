<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RegulationReferencesSchema extends BaseSchema
{
    public function __construct(
        public ?string $due_diligence_reference = null,
        public ?string $due_diligence_verification = null,
        public ?string $due_diligence_information = null,
        public ?string $due_diligence_exemption_code = null,
    ) {}
}
