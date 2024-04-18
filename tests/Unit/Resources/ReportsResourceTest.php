<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Requests\Reports\CreateReportScheduleSpecification;
use Jasara\AmznSPA\Data\Requests\Reports\CreateReportSpecification;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Responses\Reports\CreateReportResponse;
use Jasara\AmznSPA\Data\Responses\Reports\CreateReportScheduleResponse;
use Jasara\AmznSPA\Data\Responses\Reports\GetReportDocumentResponse;
use Jasara\AmznSPA\Data\Responses\Reports\GetReportResponse;
use Jasara\AmznSPA\Data\Responses\Reports\GetReportScheduleResponse;
use Jasara\AmznSPA\Data\Responses\Reports\GetReportSchedulesResponse;
use Jasara\AmznSPA\Data\Responses\Reports\GetReportsResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Jasara\AmznSPA\Resources\ReportsResource::class)]
class ReportsResourceTest extends UnitTestCase
{
    public function testGetReports()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('reports/get-reports');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->reports->getReports(['GET_MERCHANT_LISTINGS_ALL_DATA'], ['ATVPDKIKX0DER'], 10, ['DONE']);

        $this->assertInstanceOf(GetReportsResponse::class, $response);
        $this->assertEquals('ReportId1', $response->reports->first()->report_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/reports/2021-06-30/reports?reportTypes=GET_MERCHANT_LISTINGS_ALL_DATA&marketplaceIds=ATVPDKIKX0DER&pageSize=10&processingStatuses=DONE', $request->url());

            return true;
        });
    }

    public function testCreateReport()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('reports/create-report');

        $request = CreateReportSpecification::from(
            report_type: 'GET_MERCHANT_LISTINGS_ALL_DATA',
            marketplace_ids: ['ATVPDKIKX0DER'],
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->reports->createReport($request);

        $this->assertInstanceOf(CreateReportResponse::class, $response);
        $this->assertEquals('ID323', $response->report_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/reports/2021-06-30/reports', $request->url());

            return true;
        });
    }

    public function testGetReport()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('reports/get-report');

        $report_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->reports->getReport($report_id);

        $this->assertInstanceOf(GetReportResponse::class, $response);
        $this->assertEquals('ReportId1', $response->report->report_id);
        $this->assertEquals('FEE_DISCOUNTS_REPORT', $response->report->report_type);

        $http->assertSent(function (Request $request) use ($report_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/reports/2021-06-30/reports/' . $report_id, $request->url());

            return true;
        });
    }

    public function testCancelReport()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('reports/cancel-report');

        $report_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->reports->cancelReport($report_id);

        $this->assertInstanceOf(BaseResponse::class, $response);

        $http->assertSent(function (Request $request) use ($report_id) {
            $this->assertEquals('DELETE', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/reports/2021-06-30/reports/' . $report_id, $request->url());

            return true;
        });
    }

    public function testGetReportSchedules()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('reports/get-report-schedules');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->reports->getReportSchedules(['FEE_DISCOUNTS_REPORT']);

        $this->assertInstanceOf(GetReportSchedulesResponse::class, $response);
        $this->assertEquals('ID1', $response->report_schedules->first()->report_schedule_id);
        $this->assertEquals('PT5M', $response->report_schedules->first()->period);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/reports/2021-06-30/schedules', $request->url());

            return true;
        });
    }

    public function testCreateReportSchedule()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('reports/create-report-schedule');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->reports->createReportSchedule(new CreateReportScheduleSpecification(
            report_type: 'FEE_DISCOUNTS_REPORT',
            marketplace_ids: ['ATVPDKIKX0DER'],
            period: 'PT84H',
        ));

        $this->assertInstanceOf(CreateReportScheduleResponse::class, $response);
        $this->assertEquals('ID323', $response->report_schedule_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/reports/2021-06-30/schedules', $request->url());

            return true;
        });
    }

    public function testGetReportSchedule()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('reports/get-report-schedule');

        $report_schedule_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->reports->getReportSchedule($report_schedule_id);

        $this->assertInstanceOf(GetReportScheduleResponse::class, $response);
        $this->assertEquals('ReportScheduleId1', $response->report_schedule->report_schedule_id);

        $http->assertSent(function (Request $request) use ($report_schedule_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/reports/2021-06-30/schedules/' . $report_schedule_id, $request->url());

            return true;
        });
    }

    public function testCancelReportSchedule()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('reports/cancel-report-schedule');

        $report_schedule_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->reports->cancelReportSchedule($report_schedule_id);

        $this->assertInstanceOf(BaseResponse::class, $response);

        $http->assertSent(function (Request $request) use ($report_schedule_id) {
            $this->assertEquals('DELETE', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/reports/2021-06-30/schedules/' . $report_schedule_id, $request->url());

            return true;
        });
    }

    public function testGetReportDocument()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('reports/get-report-document');

        $report_document_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->reports->getReportDocument($report_document_id);

        $this->assertInstanceOf(GetReportDocumentResponse::class, $response);
        $this->assertEquals('https://d34o8swod1owfl.cloudfront.net/Report_47700__GET_MERCHANT_LISTINGS_ALL_DATA_.txt', $response->report_document->url);

        $http->assertSent(function (Request $request) use ($report_document_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/reports/2021-06-30/documents/' . $report_document_id, $request->url());

            return true;
        });
    }

    public function testGetRestrictedReportDocument()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp([
            'tokens/create-restricted-data-token',
            'reports/get-report-document',
        ]);

        $report_document_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->reports->getRestrictedReportDocument($report_document_id);

        $this->assertInstanceOf(GetReportDocumentResponse::class, $response);
        $this->assertEquals('https://d34o8swod1owfl.cloudfront.net/Report_47700__GET_MERCHANT_LISTINGS_ALL_DATA_.txt', $response->report_document->url);

        $http->assertSequencesAreEmpty();
    }
}
