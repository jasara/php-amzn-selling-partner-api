<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
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
use Jasara\AmznSPA\Resources\ServicesResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ServicesResource::class)]
class ServicesResourceTest extends UnitTestCase
{
    public function test_get_service_job_by_service_job_id(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/get-service-job-by-service-job-id');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->getServiceJobByServiceJobId(
            service_job_id: 'serviceJobIdValue',
        );

        $this->assertInstanceOf(GetServiceJobByServiceJobIdResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/serviceJobs/serviceJobIdValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_cancel_service_job_by_service_job_id(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/cancel-service-job-by-service-job-id');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->cancelServiceJobByServiceJobId(
            service_job_id: 'serviceJobIdValue',
            cancellation_reason_code: 'cancellationReasonCodeValue',
        );

        $this->assertInstanceOf(CancelServiceJobByServiceJobIdResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/serviceJobs/serviceJobIdValue/cancellations?cancellationReasonCode=cancellationReasonCodeValue', urldecode($request->url()));
            $this->assertEquals([
            ], $request->data());

            return true;
        });
    }

    public function test_complete_service_job_by_service_job_id(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/complete-service-job-by-service-job-id');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->completeServiceJobByServiceJobId(
            service_job_id: 'serviceJobIdValue',
        );

        $this->assertInstanceOf(CompleteServiceJobByServiceJobIdResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/serviceJobs/serviceJobIdValue/completions', urldecode($request->url()));
            $this->assertEquals([
            ], $request->data());

            return true;
        });
    }

    public function test_get_service_jobs(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/get-service-jobs');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->getServiceJobs(
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            service_order_ids: [
                0 => 'serviceOrderIdsOne',
                1 => 'serviceOrderIdsTwo',
            ],
            service_job_status: [
                0 => 'serviceJobStatusOne',
                1 => 'serviceJobStatusTwo',
            ],
            page_token: 'pageTokenValue',
            page_size: 10,
            sort_field: 'sortFieldValue',
            sort_order: 'sortOrderValue',
            created_after: 'createdAfterValue',
            created_before: 'createdBeforeValue',
            last_updated_after: 'lastUpdatedAfterValue',
            last_updated_before: 'lastUpdatedBeforeValue',
            schedule_start_date: 'scheduleStartDateValue',
            schedule_end_date: 'scheduleEndDateValue',
            asins: [
                0 => 'asinsOne',
                1 => 'asinsTwo',
            ],
            required_skills: [
                0 => 'requiredSkillsOne',
                1 => 'requiredSkillsTwo',
            ],
            store_ids: [
                0 => 'storeIdsOne',
                1 => 'storeIdsTwo',
            ],
        );

        $this->assertInstanceOf(GetServiceJobsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/serviceJobs?marketplaceIds=ATVPDKIKX0DER&serviceOrderIds=serviceOrderIdsOne,serviceOrderIdsTwo&serviceJobStatus=serviceJobStatusOne,serviceJobStatusTwo&pageToken=pageTokenValue&pageSize=10&sortField=sortFieldValue&sortOrder=sortOrderValue&createdAfter=createdAfterValue&createdBefore=createdBeforeValue&lastUpdatedAfter=lastUpdatedAfterValue&lastUpdatedBefore=lastUpdatedBeforeValue&scheduleStartDate=scheduleStartDateValue&scheduleEndDate=scheduleEndDateValue&asins=asinsOne,asinsTwo&requiredSkills=requiredSkillsOne,requiredSkillsTwo&storeIds=storeIdsOne,storeIdsTwo', urldecode($request->url()));

            return true;
        });
    }

    public function test_add_appointment_for_service_job_by_service_job_id(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/add-appointment-for-service-job-by-service-job-id');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->addAppointmentForServiceJobByServiceJobId(
            service_job_id: 'serviceJobIdValue',
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(AddAppointmentForServiceJobByServiceJobIdResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/serviceJobs/serviceJobIdValue/appointments', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_reschedule_appointment_for_service_job_by_service_job_id(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/reschedule-appointment-for-service-job-by-service-job-id');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->rescheduleAppointmentForServiceJobByServiceJobId(
            service_job_id: 'serviceJobIdValue',
            appointment_id: 'appointmentIdValue',
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(RescheduleAppointmentForServiceJobByServiceJobIdResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/serviceJobs/serviceJobIdValue/appointments/appointmentIdValue', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_assign_appointment_resources(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/assign-appointment-resources');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->assignAppointmentResources(
            service_job_id: 'serviceJobIdValue',
            appointment_id: 'appointmentIdValue',
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(AssignAppointmentResourcesResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/serviceJobs/serviceJobIdValue/appointments/appointmentIdValue/resources', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_set_appointment_fulfillment_data(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/set-appointment-fulfillment-data');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->setAppointmentFulfillmentData(
            service_job_id: 'serviceJobIdValue',
            appointment_id: 'appointmentIdValue',
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(SetAppointmentFulfillmentDataResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/serviceJobs/serviceJobIdValue/appointments/appointmentIdValue/fulfillment', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_get_range_slot_capacity(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/get-range-slot-capacity');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->getRangeSlotCapacity(
            resource_id: 'resourceIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            next_page_token: 'nextPageTokenValue',
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(GetRangeSlotCapacityResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/serviceResources/resourceIdValue/capacity/range?marketplaceIds=ATVPDKIKX0DER&nextPageToken=nextPageTokenValue', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_get_fixed_slot_capacity(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/get-fixed-slot-capacity');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->getFixedSlotCapacity(
            resource_id: 'resourceIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            next_page_token: 'nextPageTokenValue',
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(GetFixedSlotCapacityResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/serviceResources/resourceIdValue/capacity/fixed?marketplaceIds=ATVPDKIKX0DER&nextPageToken=nextPageTokenValue', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_update_schedule(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/update-schedule');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->updateSchedule(
            resource_id: 'resourceIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(UpdateScheduleResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/serviceResources/resourceIdValue/schedules?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_create_reservation(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/create-reservation');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->createReservation(
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(CreateReservationResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/reservation?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_update_reservation(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/update-reservation');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->updateReservation(
            reservation_id: 'reservationIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(UpdateReservationResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/reservation/reservationIdValue?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }

    public function test_cancel_reservation(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/cancel-reservation');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->cancelReservation(
            reservation_id: 'reservationIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
        );

        $this->assertInstanceOf(CancelReservationResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('DELETE', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/reservation/reservationIdValue?marketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));

            return true;
        });
    }

    public function test_get_appointmment_slots_by_job_id(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/get-appointmment-slots-by-job-id');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->getAppointmmentSlotsByJobId(
            service_job_id: 'serviceJobIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            start_time: 'startTimeValue',
            end_time: 'endTimeValue',
        );

        $this->assertInstanceOf(GetAppointmmentSlotsByJobIdResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/serviceJobs/serviceJobIdValue/appointmentSlots?marketplaceIds=ATVPDKIKX0DER&startTime=startTimeValue&endTime=endTimeValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_get_appointment_slots(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/get-appointment-slots');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->getAppointmentSlots(
            asin: 'asinValue',
            store_id: 'storeIdValue',
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            start_time: 'startTimeValue',
            end_time: 'endTimeValue',
        );

        $this->assertInstanceOf(GetAppointmentSlotsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/appointmentSlots?asin=asinValue&storeId=storeIdValue&marketplaceIds=ATVPDKIKX0DER&startTime=startTimeValue&endTime=endTimeValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_create_service_document_upload_destination(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('services/create-service-document-upload-destination');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->services->createServiceDocumentUploadDestination(
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(CreateServiceDocumentUploadDestinationResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/service/v1/documents', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }
}
