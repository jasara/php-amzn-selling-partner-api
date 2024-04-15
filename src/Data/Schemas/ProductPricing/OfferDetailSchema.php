<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class OfferDetailSchema extends DataTransferObject
{
    public ?bool $my_offer;

    #[StringEnumValidator(['B2C', 'B2B'])]
    public ?string $offer_customer_type;

    public string $sub_condition;

    public ?string $seller_id;

    public ?string $condition_notes;

    public ?SellerFeedbackTypeSchema $seller_feedback_rating;

    public DetailedShippingTimeTypeSchema $shipping_time;

    public MoneySchema $listing_price;

    public ?QuantityDiscountPriceTypeSchema $quantity_discount_prices;

    public ?PointsSchema $points;

    public MoneySchema $shipping;

    public ?ShipsFromTypeShema $ships_from;

    public bool $is_fulfilled_by_amazon;

    public ?PrimeInformationTypeSchema $prime_information;

    public ?bool $is_buy_box_winner;

    public ?bool $is_featured_merchant;
}
