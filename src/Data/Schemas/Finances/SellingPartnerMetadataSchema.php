<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SellingPartnerMetadataSchema extends BaseSchema
{
    public function __construct(
        public ?string $selling_partner_id = null,
        public ?string $account_type = null,
        public ?string $marketplace_id = null,
    ) {}
}
