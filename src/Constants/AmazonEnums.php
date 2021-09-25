<?php

namespace Jasara\AmznSPA\Constants;

class AmazonEnums
{
    const CONDITIONS = [
        'NewItem',
        'NewWithWarranty',
        'NewOEM',
        'NewOpenBox',
        'UsedLikeNew',
        'UsedVeryGood',
        'UsedGood',
        'UsedAcceptable',
        'UsedPoor',
        'UsedRefurbished',
        'CollectibleLikeNew',
        'CollectibleVeryGood',
        'CollectibleGood',
        'CollectibleAcceptable',
        'CollectiblePoor',
        'RefurbishedWithWarranty',
        'Refurbished',
        'Club',
    ];

    const NOTIFICATION_TYPES = [
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

    const PREP_INSTRUCTIONS = [
        'Polybagging',
        'BubbleWrapping',
        'Taping',
        'BlackShrinkWrapping',
        'Labeling',
        'HangGarment',
    ];

    const SHIPMENT_STATUSES = [
        'WORKING',
        'SHIPPED',
        'RECEIVING',
        'CANCELLED',
        'DELETED',
        'CLOSED',
        'ERROR',
        'IN_TRANSIT',
        'DELIVERED',
        'CHECKED_IN',
    ];

    const PACKAGE_STATUSES = [
        'SHIPPED',
        'IN_TRANSIT',
        'DELIVERED',
        'CHECKED_IN',
        'RECEIVING',
        'CLOSED',
        'DELETED',
    ];

    const SELLER_FREIGHT_CLASSES = [
        '50',
        '55',
        '60',
        '65',
        '70',
        '77.5',
        '85',
        '92.5',
        '100',
        '110',
        '125',
        '150',
        '175',
        '200',
        '250',
        '300',
        '400',
        '500',
    ];

    const TRANSPORT_STATUSES = [
        'WORKING',
        'ESTIMATING',
        'ESTIMATED',
        'ERROR_ON_ESTIMATING',
        'CONFIRMING',
        'CONFIRMED',
        'ERROR_ON_CONFIRMING',
        'VOIDING',
        'VOIDED',
        'ERROR_IN_VOIDING',
        'ERROR',
    ];
}
