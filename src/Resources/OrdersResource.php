<?php

namespace Jasara\AmznSPA\Resources;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrderAddressResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrderBuyerInfoResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrderItemsBuyerInfoResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrderItemsResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrderResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrdersResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class OrdersResource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/orders/v0/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getOrders(
        ?CarbonImmutable $created_after,
        ?CarbonImmutable $created_before,
        ?CarbonImmutable $last_updated_after,
        ?CarbonImmutable $last_updated_before,
        ?array $order_statuses,
        array $marketplace_ids,
        ?array $fulfillment_channels = [],
        ?array $payment_methods = [],
        ?string $buyer_email = null,
        ?string $seller_order_id = null,
        ?int $max_results_per_page = null,
        ?array $easy_ship_shipment_statuses = [],
        ?string $next_token = null,
        ?array $amazon_order_ids = [],
        ?string $actual_fulfillment_supply_source_id = null,
        ?bool $is_ispu = null,
        ?string $store_chain_store_id = null,
    ): GetOrdersResponse {
        $this->validateIsArrayOfStrings($order_statuses);
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'orders', array_filter([
            'created_after'=>$created_after,
            'created_before'=>$created_before,
            'last_updated_after'=>$last_updated_after,
            'last_updated_before'=>$last_updated_before,
            'order_statuses'=>$order_statuses,
            'fulfillment_channels'=>$fulfillment_channels,
            'payment_methods'=>$payment_methods,
            'buyer_email'=>$buyer_email,
            'seller_order_id'=>$seller_order_id,
            'max_results_per_page'=>$max_results_per_page,
            'easy_ship_shipment_statuses'=>$easy_ship_shipment_statuses,
            'next_token'=>$next_token,
            'amazon_order_ids'=>$amazon_order_ids,
            'actual_fulfillment_supply_source_id'=>$actual_fulfillment_supply_source_id,
            'is_ispu'=>$is_ispu,
            'store_chain_store_id'=>$store_chain_store_id,
        ]));

        return new GetOrdersResponse($response);
    }

    public function getOrder(string $order_id): GetOrderResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'orders/' . $order_id);

        return new GetOrderResponse($response);
    }

    public function getOrderBuyerInfo(string $order_id): GetOrderBuyerInfoResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'orders/' . $order_id . '/buyerInfo');

        return new GetOrderBuyerInfoResponse($response);
    }

    public function getOrderAddress(string $order_id): GetOrderAddressResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'orders/' . $order_id . '/address');

        return new GetOrderAddressResponse($response);
    }

    public function getOrderItems(string $order_id, ?string $next_token = null): GetOrderItemsResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'orders/' . $order_id . '/orderItems');

        return new GetOrderItemsResponse($response);
    }

    public function getOrderItemsBuyerInfo(string $order_id, ?string $next_token = null): GetOrderItemsBuyerInfoResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'orders/' . $order_id . '/orderItems/buyerInfo');

        return new GetOrderItemsBuyerInfoResponse($response);
    }
}
