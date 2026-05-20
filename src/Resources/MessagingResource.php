<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\ConfirmCustomizationDetailsResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\CreateConfirmDeliveryDetailsResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\CreateConfirmOrderDetailsResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\CreateConfirmServiceDetailsResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\CreateDigitalAccessKeyResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\CreateLegalDisclosureResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\CreateUnexpectedProblemResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\CreateWarrantyResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\GetAttributesResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\GetMessagingActionsForOrderResponse;
use Jasara\AmznSPA\Data\Responses\Messaging\SendInvoiceResponse;

class MessagingResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function getMessagingActionsForOrder(
        string $amazon_order_id,
        array $marketplace_ids
    ): GetMessagingActionsForOrderResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetMessagingActionsForOrderResponse::class)
            ->get($this->endpoint . '/messaging/v1/orders/' . rawurlencode((string) $amazon_order_id), $this->filterQuery([
                'marketplaceIds' => $marketplace_ids,
            ]));

        return $response;
    }

    public function confirmCustomizationDetails(
        string $amazon_order_id,
        array $marketplace_ids,
        array $request_body
    ): ConfirmCustomizationDetailsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(ConfirmCustomizationDetailsResponse::class)
            ->post(
                $this->endpoint . '/messaging/v1/orders/' . rawurlencode((string) $amazon_order_id) . '/messages/confirmCustomizationDetails' . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function createConfirmDeliveryDetails(
        string $amazon_order_id,
        array $marketplace_ids,
        array $request_body
    ): CreateConfirmDeliveryDetailsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CreateConfirmDeliveryDetailsResponse::class)
            ->post(
                $this->endpoint . '/messaging/v1/orders/' . rawurlencode((string) $amazon_order_id) . '/messages/confirmDeliveryDetails' . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function createLegalDisclosure(
        string $amazon_order_id,
        array $marketplace_ids,
        array $request_body
    ): CreateLegalDisclosureResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CreateLegalDisclosureResponse::class)
            ->post(
                $this->endpoint . '/messaging/v1/orders/' . rawurlencode((string) $amazon_order_id) . '/messages/legalDisclosure' . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function createConfirmOrderDetails(
        string $amazon_order_id,
        array $marketplace_ids,
        array $request_body
    ): CreateConfirmOrderDetailsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CreateConfirmOrderDetailsResponse::class)
            ->post(
                $this->endpoint . '/messaging/v1/orders/' . rawurlencode((string) $amazon_order_id) . '/messages/confirmOrderDetails' . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function createConfirmServiceDetails(
        string $amazon_order_id,
        array $marketplace_ids,
        array $request_body
    ): CreateConfirmServiceDetailsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CreateConfirmServiceDetailsResponse::class)
            ->post(
                $this->endpoint . '/messaging/v1/orders/' . rawurlencode((string) $amazon_order_id) . '/messages/confirmServiceDetails' . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function createWarranty(
        string $amazon_order_id,
        array $marketplace_ids,
        array $request_body
    ): CreateWarrantyResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CreateWarrantyResponse::class)
            ->post(
                $this->endpoint . '/messaging/v1/orders/' . rawurlencode((string) $amazon_order_id) . '/messages/warranty' . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function getAttributes(
        string $amazon_order_id,
        array $marketplace_ids
    ): GetAttributesResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetAttributesResponse::class)
            ->get($this->endpoint . '/messaging/v1/orders/' . rawurlencode((string) $amazon_order_id) . '/attributes', $this->filterQuery([
                'marketplaceIds' => $marketplace_ids,
            ]));

        return $response;
    }

    public function createDigitalAccessKey(
        string $amazon_order_id,
        array $marketplace_ids,
        array $request_body
    ): CreateDigitalAccessKeyResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CreateDigitalAccessKeyResponse::class)
            ->post(
                $this->endpoint . '/messaging/v1/orders/' . rawurlencode((string) $amazon_order_id) . '/messages/digitalAccessKey' . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function createUnexpectedProblem(
        string $amazon_order_id,
        array $marketplace_ids,
        array $request_body
    ): CreateUnexpectedProblemResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CreateUnexpectedProblemResponse::class)
            ->post(
                $this->endpoint . '/messaging/v1/orders/' . rawurlencode((string) $amazon_order_id) . '/messages/unexpectedProblem' . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                ]),
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function sendInvoice(
        string $amazon_order_id,
        array $marketplace_ids,
        array $request_body
    ): SendInvoiceResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SendInvoiceResponse::class)
            ->post(
                $this->endpoint . '/messaging/v1/orders/' . rawurlencode((string) $amazon_order_id) . '/messages/invoice' . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                ]),
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
