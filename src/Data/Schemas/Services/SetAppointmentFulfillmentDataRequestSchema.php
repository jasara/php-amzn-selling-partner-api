<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SetAppointmentFulfillmentDataRequestSchema extends BaseSchema
{
    public function __construct(
        public ?DateTimeRangeSchema $estimated_arrival_time = null,
        public ?FulfillmentTimeSchema $fulfillment_time = null,
        public ?AppointmentResourcesSchema $appointment_resources = null,
        public ?FulfillmentDocumentsSchema $fulfillment_documents = null,
    ) {}
}
