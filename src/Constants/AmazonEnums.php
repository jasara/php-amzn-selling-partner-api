<?php

namespace Jasara\AmznSPA\Constants;

class AmazonEnums
{
    public static function notificationTypes(): array
    {
        return [
            'ANY_OFFER_CHANGED',
            'FEED_PROCESSING_FINISHED',
            'FBA_OUTBOUND_SHIPMENT_STATUS',
            'FEE_PROMOTION',
            'FULFILLMENT_ORDER_STATUS',
            'REPORT_PROCESSING_FINISHED',
            'BRANDED_ITEM_CONTENT_CHANGE',
            'ITEM_PRODUCT_TYPE_CHANGE',
            'LISTINGS_ITEM_STATUS_CHANGE',
            'LISTINGS_ITEM_ISSUES_CHANGE',
            'MFN_ORDER_STATUS_CHANGE',
            'B2B_ANY_OFFER_CHANGED',
            'ACCOUNT_STATUS_CHANGED',
            'EXTERNAL_FULFILLMENT_SHIPMENT_STATUS_CHANGE',
        ];
    }
}
