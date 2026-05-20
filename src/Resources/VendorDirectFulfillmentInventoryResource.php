<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentInventory\SubmitInventoryUpdateResponse;

class VendorDirectFulfillmentInventoryResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function submitInventoryUpdate(
        string $warehouse_id,
        array $request_body
    ): SubmitInventoryUpdateResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SubmitInventoryUpdateResponse::class)
            ->post(
                $this->endpoint . '/vendor/directFulfillment/inventory/v1/warehouses/' . rawurlencode((string) $warehouse_id) . '/items',
                deep_array_conversion($request_body),
            );

        return $response;
    }
}
