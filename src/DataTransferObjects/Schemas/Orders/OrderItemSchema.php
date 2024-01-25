<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class OrderItemSchema extends DataTransferObject
{
    public string $asin;

    public ?string $seller_sku;

    public string $order_item_id;

    public ?string $title;

    public int $quantity_ordered;

    public ?int $ouantity_shipped;

    public ?ProductInfoDetailSchema $product_info;

    public ?PointsGrantedDetailSchema $points_granted;

    public ?MoneySchema $item_price;

    public ?MoneySchema $shipping_price;

    public ?MoneySchema $item_tax;

    public ?MoneySchema $shipping_tax;

    public ?MoneySchema $shipping_discount;

    public ?MoneySchema $shipping_discount_tax;

    public ?MoneySchema $promotion_discount;

    public ?MoneySchema $promotion_discount_tax;

    public ?array $promotion_ids;

    public ?MoneySchema $cod_fee;

    public ?MoneySchema $cod_fee_discount;

    public ?bool $is_gift;

    public ?string $condition_note;

    public ?string $condition_id;

    public ?string $condition_subtype_id;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $scheduled_delivery_start_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $scheduled_delivery_end_date;

    public ?string $price_designation;

    public ?TaxCollectionSchema $tax_collection;

    public ?bool $serial_number_required;

    public ?bool $is_transparency;

    public ?string $ioss_number;

    public ?string $store_chain_store_id;

    #[StringEnumValidator(['IOSS', 'UOSS', 'CA_MPF'])]
    public ?string $deemed_reseller_category;

    public ?ItemBuyerInfoSchema $buyer_info;
}
