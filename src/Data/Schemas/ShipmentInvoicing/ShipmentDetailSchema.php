<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ShipmentInvoicing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentDetailSchema extends BaseSchema
{
    public function __construct(
        public ?string $warehouse_id = null,
        public ?string $amazon_order_id = null,
        public ?string $amazon_shipment_id = null,
        public ?string $purchase_date = null,
        public ?AddressSchema $shipping_address = null,
        public ?array $payment_method_details = null,
        public ?PaymentInformationListSchema $payments = null,
        public ?string $marketplace_id = null,
        public ?string $seller_id = null,
        public ?string $buyer_name = null,
        public ?string $buyer_county = null,
        public ?BuyerTaxInfoSchema $buyer_tax_info = null,
        public ?MarketplaceTaxInfoSchema $marketplace_tax_info = null,
        public ?string $seller_display_name = null,
        public ?ShipmentItemsSchema $shipment_items = null,
    ) {}
}
