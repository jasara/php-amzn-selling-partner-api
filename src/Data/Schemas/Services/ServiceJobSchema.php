<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ServiceJobSchema extends BaseSchema
{
    public function __construct(
        public ?string $create_time = null,
        public ?string $service_job_id = null,
        public ?string $service_job_status = null,
        public ?ScopeOfWorkSchema $scope_of_work = null,
        public ?SellerSchema $seller = null,
        public ?ServiceJobProviderSchema $service_job_provider = null,
        public ?array $preferred_appointment_times = null,
        public ?array $appointments = null,
        public ?string $service_order_id = null,
        public ?string $marketplace_id = null,
        public ?string $store_id = null,
        public ?BuyerSchema $buyer = null,
        public ?array $associated_items = null,
        public ?ServiceLocationSchema $service_location = null,
        public ?array $payments = null,
    ) {}
}
