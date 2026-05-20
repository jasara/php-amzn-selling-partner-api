<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\Services\AddAppointmentForServiceJobByServiceJobIdResponse;
use Jasara\AmznSPA\Data\Responses\Services\AssignAppointmentResourcesResponse;
use Jasara\AmznSPA\Data\Responses\Services\CancelReservationResponse;
use Jasara\AmznSPA\Data\Responses\Services\CancelServiceJobByServiceJobIdResponse;
use Jasara\AmznSPA\Data\Responses\Services\CompleteServiceJobByServiceJobIdResponse;
use Jasara\AmznSPA\Data\Responses\Services\CreateReservationResponse;
use Jasara\AmznSPA\Data\Responses\Services\CreateServiceDocumentUploadDestinationResponse;
use Jasara\AmznSPA\Data\Responses\Services\GetAppointmentSlotsResponse;
use Jasara\AmznSPA\Data\Responses\Services\GetAppointmmentSlotsByJobIdResponse;
use Jasara\AmznSPA\Data\Responses\Services\GetFixedSlotCapacityResponse;
use Jasara\AmznSPA\Data\Responses\Services\GetRangeSlotCapacityResponse;
use Jasara\AmznSPA\Data\Responses\Services\GetServiceJobByServiceJobIdResponse;
use Jasara\AmznSPA\Data\Responses\Services\GetServiceJobsResponse;
use Jasara\AmznSPA\Data\Responses\Services\RescheduleAppointmentForServiceJobByServiceJobIdResponse;
use Jasara\AmznSPA\Data\Responses\Services\SetAppointmentFulfillmentDataResponse;
use Jasara\AmznSPA\Data\Responses\Services\UpdateReservationResponse;
use Jasara\AmznSPA\Data\Responses\Services\UpdateScheduleResponse;

class ServicesResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function getServiceJobByServiceJobId(
        string $service_job_id
    ): GetServiceJobByServiceJobIdResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetServiceJobByServiceJobIdResponse::class)
            ->get($this->endpoint . '/service/v1/serviceJobs/' . rawurlencode((string) $service_job_id));

        return $response;
    }

    public function cancelServiceJobByServiceJobId(
        string $service_job_id,
        string $cancellation_reason_code
    ): CancelServiceJobByServiceJobIdResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CancelServiceJobByServiceJobIdResponse::class)
            ->put(
                $this->endpoint . '/service/v1/serviceJobs/' . rawurlencode((string) $service_job_id) . '/cancellations' . $this->buildQueryString([
                    'cancellationReasonCode' => $cancellation_reason_code,
                ]),
                [],
            );

        return $response;
    }

    public function completeServiceJobByServiceJobId(
        string $service_job_id
    ): CompleteServiceJobByServiceJobIdResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CompleteServiceJobByServiceJobIdResponse::class)
            ->put(
                $this->endpoint . '/service/v1/serviceJobs/' . rawurlencode((string) $service_job_id) . '/completions',
                [],
            );

        return $response;
    }

    public function getServiceJobs(
        array $marketplace_ids,
        ?array $service_order_ids = null,
        ?array $service_job_status = null,
        ?string $page_token = null,
        ?int $page_size = null,
        ?string $sort_field = null,
        ?string $sort_order = null,
        ?string $created_after = null,
        ?string $created_before = null,
        ?string $last_updated_after = null,
        ?string $last_updated_before = null,
        ?string $schedule_start_date = null,
        ?string $schedule_end_date = null,
        ?array $asins = null,
        ?array $required_skills = null,
        ?array $store_ids = null
    ): GetServiceJobsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetServiceJobsResponse::class)
            ->get($this->endpoint . '/service/v1/serviceJobs', $this->filterQuery([
                'marketplaceIds' => $marketplace_ids,
                'serviceOrderIds' => $service_order_ids,
                'serviceJobStatus' => $service_job_status,
                'pageToken' => $page_token,
                'pageSize' => $page_size,
                'sortField' => $sort_field,
                'sortOrder' => $sort_order,
                'createdAfter' => $created_after,
                'createdBefore' => $created_before,
                'lastUpdatedAfter' => $last_updated_after,
                'lastUpdatedBefore' => $last_updated_before,
                'scheduleStartDate' => $schedule_start_date,
                'scheduleEndDate' => $schedule_end_date,
                'asins' => $asins,
                'requiredSkills' => $required_skills,
                'storeIds' => $store_ids,
            ]));

        return $response;
    }

    public function addAppointmentForServiceJobByServiceJobId(
        string $service_job_id,
        array $request_body
    ): AddAppointmentForServiceJobByServiceJobIdResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(AddAppointmentForServiceJobByServiceJobIdResponse::class)
            ->post(
                $this->endpoint . '/service/v1/serviceJobs/' . rawurlencode((string) $service_job_id) . '/appointments',
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function rescheduleAppointmentForServiceJobByServiceJobId(
        string $service_job_id,
        string $appointment_id,
        array $request_body
    ): RescheduleAppointmentForServiceJobByServiceJobIdResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(RescheduleAppointmentForServiceJobByServiceJobIdResponse::class)
            ->post(
                $this->endpoint . '/service/v1/serviceJobs/' . rawurlencode((string) $service_job_id) . '/appointments/' . rawurlencode((string) $appointment_id),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function assignAppointmentResources(
        string $service_job_id,
        string $appointment_id,
        array $request_body
    ): AssignAppointmentResourcesResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(AssignAppointmentResourcesResponse::class)
            ->put(
                $this->endpoint . '/service/v1/serviceJobs/' . rawurlencode((string) $service_job_id) . '/appointments/' . rawurlencode((string) $appointment_id) . '/resources',
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function setAppointmentFulfillmentData(
        string $service_job_id,
        string $appointment_id,
        array $request_body
    ): SetAppointmentFulfillmentDataResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SetAppointmentFulfillmentDataResponse::class)
            ->put(
                $this->endpoint . '/service/v1/serviceJobs/' . rawurlencode((string) $service_job_id) . '/appointments/' . rawurlencode((string) $appointment_id) . '/fulfillment',
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function getRangeSlotCapacity(
        string $resource_id,
        array $marketplace_ids,
        array $request_body,
        ?string $next_page_token = null
    ): GetRangeSlotCapacityResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetRangeSlotCapacityResponse::class)
            ->post(
                $this->endpoint . '/service/v1/serviceResources/' . rawurlencode((string) $resource_id) . '/capacity/range' . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                    'nextPageToken' => $next_page_token,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function getFixedSlotCapacity(
        string $resource_id,
        array $marketplace_ids,
        array $request_body,
        ?string $next_page_token = null
    ): GetFixedSlotCapacityResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetFixedSlotCapacityResponse::class)
            ->post(
                $this->endpoint . '/service/v1/serviceResources/' . rawurlencode((string) $resource_id) . '/capacity/fixed' . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                    'nextPageToken' => $next_page_token,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function updateSchedule(
        string $resource_id,
        array $marketplace_ids,
        array $request_body
    ): UpdateScheduleResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(UpdateScheduleResponse::class)
            ->put(
                $this->endpoint . '/service/v1/serviceResources/' . rawurlencode((string) $resource_id) . '/schedules' . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function createReservation(
        array $marketplace_ids,
        array $request_body
    ): CreateReservationResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CreateReservationResponse::class)
            ->post(
                $this->endpoint . '/service/v1/reservation' . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function updateReservation(
        string $reservation_id,
        array $marketplace_ids,
        array $request_body
    ): UpdateReservationResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(UpdateReservationResponse::class)
            ->put(
                $this->endpoint . '/service/v1/reservation/' . rawurlencode((string) $reservation_id) . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function cancelReservation(
        string $reservation_id,
        array $marketplace_ids
    ): CancelReservationResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CancelReservationResponse::class)
            ->delete($this->endpoint . '/service/v1/reservation/' . rawurlencode((string) $reservation_id) . $this->buildQueryString([
                'marketplaceIds' => $marketplace_ids,
            ]));

        return $response;
    }

    public function getAppointmmentSlotsByJobId(
        string $service_job_id,
        array $marketplace_ids,
        ?string $start_time = null,
        ?string $end_time = null
    ): GetAppointmmentSlotsByJobIdResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetAppointmmentSlotsByJobIdResponse::class)
            ->get($this->endpoint . '/service/v1/serviceJobs/' . rawurlencode((string) $service_job_id) . '/appointmentSlots', $this->filterQuery([
                'marketplaceIds' => $marketplace_ids,
                'startTime' => $start_time,
                'endTime' => $end_time,
            ]));

        return $response;
    }

    public function getAppointmentSlots(
        string $asin,
        string $store_id,
        array $marketplace_ids,
        ?string $start_time = null,
        ?string $end_time = null
    ): GetAppointmentSlotsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetAppointmentSlotsResponse::class)
            ->get($this->endpoint . '/service/v1/appointmentSlots', $this->filterQuery([
                'asin' => $asin,
                'storeId' => $store_id,
                'marketplaceIds' => $marketplace_ids,
                'startTime' => $start_time,
                'endTime' => $end_time,
            ]));

        return $response;
    }

    public function createServiceDocumentUploadDestination(
        array $request_body
    ): CreateServiceDocumentUploadDestinationResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CreateServiceDocumentUploadDestinationResponse::class)
            ->post(
                $this->endpoint . '/service/v1/documents',
                deep_array_conversion($request_body),
            );

        return $response;
    }

    private function filterQuery(array $query): array
    {
        return array_filter($query, fn ($value) => $value !== null);
    }

    private function buildQueryString(array $query): string
    {
        $query = $this->filterQuery($query);

        foreach ($query as $key => $value) {
            if (is_array($value) && array_values($value) === $value) {
                $query[$key] = implode(',', $value);
            }
        }

        return '?' . http_build_query($query, '', '&', PHP_QUERY_RFC3986);
    }
}
