<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use ArrayObject;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class InboundShipmentPlanRequestItemSchema extends DataTransferObject
{
    public string $seller_sku;

    public string $asin;

    #[StringEnumValidator(AmazonEnums::CONDITIONS)]
    public string $condition;

    public int $quantity;

    public ?int $quantity_in_case;

    #[CastWith(ArrayCaster::class, itemType: PrepDetailsSchema::class)]
    public ?PrepDetailsListSchema $prep_details_list;

    public function toArrayObject(): ArrayObject
    {
        $prep_details_list = $this->prep_details_list?->map(function ($item) {
            return $item->toArrayObject();
        })->toArray();

        return new ArrayObject(array_filter([
            'SellerSKU' => $this->seller_sku,
            'ASIN' => $this->asin,
            'Condition' => $this->condition,
            'Quantity' => $this->quantity,
            'QuantityInCase' => $this->quantity_in_case,
            'PrepDetailsList' => $prep_details_list,
        ]));
    }
}
