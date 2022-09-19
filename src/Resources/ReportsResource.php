<?php

namespace Jasara\AmznSPA\Resources;

use Carbon\CarbonImmutable;
use Illuminate\Support\Arr;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Requests\Reports\CreateReportScheduleSpecification;
use Jasara\AmznSPA\DataTransferObjects\Requests\Reports\CreateReportSpecification;
use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Reports\CreateReportResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Reports\CreateReportScheduleResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Reports\GetReportDocumentResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Reports\GetReportResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Reports\GetReportScheduleResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Reports\GetReportSchedulesResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Reports\GetReportsResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class ReportsResource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/reports/2021-06-30/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getReports(
        ?array $report_types = null,
        ?array $marketplace_ids = null,
        ?int $page_size = null,
        ?array $processing_statuses = null,
        ?CarbonImmutable $created_since = null,
        ?CarbonImmutable $created_until = null,
        ?string $next_token = null,
    ): GetReportsResponse {
        if ($report_types) {
            $this->validateIsArrayOfStrings($report_types, AmazonEnums::REPORT_TYPES);
        }
        if ($marketplace_ids) {
            $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());
        }
        if ($processing_statuses) {
            $this->validateIsArrayOfStrings($processing_statuses, AmazonEnums::PROCESSING_STATUSES);
        }

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'reports', array_filter([
            'reportTypes' => $report_types,
            'marketplaceIds' => $marketplace_ids,
            'pageSize' => $page_size,
            'processingStatuses' => $processing_statuses,
            'createdSince' => $created_since?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
            'createdUntil' => $created_until?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
            'nextToken' => $next_token,
        ]));

        return new GetReportsResponse($response);
    }

    public function createReport(CreateReportSpecification $request): CreateReportResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'reports', (array) $request->toArrayObject());

        return new CreateReportResponse($response);
    }

    public function getReport(string $report_id): GetReportResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'reports/' . $report_id);

        $errors = Arr::get($response, 'errors');

        return new GetReportResponse(
            errors: $errors,
            report: $errors ? null : $response,
            metadata: Arr::get($response, 'metadata'),
        );
    }

    public function cancelReport(string $report_id): BaseResponse
    {
        $response = $this->http->delete($this->endpoint . self::BASE_PATH . 'reports/' . $report_id);

        return new BaseResponse($response);
    }

    public function getReportSchedules(array $report_types): GetReportSchedulesResponse
    {
        $this->validateIsArrayOfStrings($report_types, AmazonEnums::REPORT_TYPES);

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'schedules');

        return new GetReportSchedulesResponse($response);
    }

    public function createReportSchedule(CreateReportScheduleSpecification $request): CreateReportScheduleResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'schedules', (array) $request->toArrayObject());

        return new CreateReportScheduleResponse($response);
    }

    public function getReportSchedule(string $report_schedule_id): GetReportScheduleResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'schedules/' . $report_schedule_id);

        $errors = Arr::get($response, 'errors');

        return new GetReportScheduleResponse(
            errors: $errors,
            report_schedule: $errors ? null : $response,
            metadata: Arr::get($response, 'metadata'),
        );
    }

    public function cancelReportSchedule(string $report_schedule_id): BaseResponse
    {
        $response = $this->http->delete($this->endpoint . self::BASE_PATH . 'schedules/' . $report_schedule_id);

        return new BaseResponse($response);
    }

    public function getReportDocument(string $report_document_id): GetReportDocumentResponse
    {
        $this->http->setRestrictedDataElements(['buyerInfo']);
        
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'documents/' . $report_document_id);

        $errors = Arr::get($response, 'errors');

        return new GetReportDocumentResponse(
            errors: $errors,
            report_document: $errors ? null : $response,
            metadata: Arr::get($response, 'metadata'),
        );
    }
}
