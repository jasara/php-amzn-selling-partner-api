<?php

namespace Jasara\AmznSPA\Resources;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Requests\Reports\CreateReportScheduleSpecification;
use Jasara\AmznSPA\Data\Requests\Reports\CreateReportSpecification;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\Reports\CreateReportResponse;
use Jasara\AmznSPA\Data\Responses\Reports\CreateReportScheduleResponse;
use Jasara\AmznSPA\Data\Responses\Reports\GetReportDocumentResponse;
use Jasara\AmznSPA\Data\Responses\Reports\GetReportResponse;
use Jasara\AmznSPA\Data\Responses\Reports\GetReportScheduleResponse;
use Jasara\AmznSPA\Data\Responses\Reports\GetReportSchedulesResponse;
use Jasara\AmznSPA\Data\Responses\Reports\GetReportsResponse;
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
    ): GetReportsResponse|ErrorListResponse {
        if ($report_types) {
            $this->validateIsArrayOfStrings($report_types, AmazonEnums::REPORT_TYPES);
        }
        if ($marketplace_ids) {
            $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());
        }
        if ($processing_statuses) {
            $this->validateIsArrayOfStrings($processing_statuses, AmazonEnums::PROCESSING_STATUSES);
        }

        $response = $this->http
            ->responseClass(GetReportsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'reports', array_filter([
                'reportTypes' => $report_types,
                'marketplaceIds' => $marketplace_ids,
                'pageSize' => $page_size,
                'processingStatuses' => $processing_statuses,
                'createdSince' => $created_since?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
                'createdUntil' => $created_until?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
                'nextToken' => $next_token,
            ]));

        return $response;
    }

    public function createReport(CreateReportSpecification $request): CreateReportResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(CreateReportResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'reports',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    public function getReport(string $report_id): GetReportResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetReportResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'reports/' . $report_id);

        return $response;
    }

    public function cancelReport(string $report_id): BaseResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(BaseResponse::class)
            ->delete($this->endpoint . self::BASE_PATH . 'reports/' . $report_id);

        return $response;
    }

    public function getReportSchedules(array $report_types): GetReportSchedulesResponse|ErrorListResponse
    {
        $this->validateIsArrayOfStrings($report_types, AmazonEnums::REPORT_TYPES);

        $response = $this->http
            ->responseClass(GetReportSchedulesResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'schedules');

        return $response;
    }

    public function createReportSchedule(CreateReportScheduleSpecification $request): CreateReportScheduleResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(CreateReportScheduleResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'schedules',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    public function getReportSchedule(string $report_schedule_id): GetReportScheduleResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetReportScheduleResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'schedules/' . $report_schedule_id);

        return $response;
    }

    public function cancelReportSchedule(string $report_schedule_id): BaseResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(BaseResponse::class)
            ->delete($this->endpoint . self::BASE_PATH . 'schedules/' . $report_schedule_id);

        return $response;
    }

    public function getReportDocument(string $report_document_id): GetReportDocumentResponse|ErrorListResponse
    {
        $response = $this->http
            ->responseClass(GetReportDocumentResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'documents/' . $report_document_id);

        return $response;
    }

    public function getRestrictedReportDocument(string $report_document_id): GetReportDocumentResponse|ErrorListResponse
    {
        $this->http->useRestrictedDataToken();

        return $this->getReportDocument($report_document_id);
    }
}
