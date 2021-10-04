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

    const FEED_TYPES = [
        // Listing feeds
        'JSON_LISTINGS_FEED',
        'POST_PRODUCT_DATA',
        'POST_INVENTORY_AVAILABILITY_DATA',
        'POST_PRODUCT_OVERRIDES_DATA',
        'POST_PRODUCT_PRICING_DATA',
        'POST_PRODUCT_IMAGE_DATA',
        'POST_PRODUCT_RELATIONSHIP_DATA',
        'POST_FLAT_FILE_INVLOADER_DATA',
        'POST_FLAT_FILE_LISTINGS_DATA',
        'POST_FLAT_FILE_BOOKLOADER_DATA',
        'POST_FLAT_FILE_CONVERGENCE_LISTINGS_DATA',
        'POST_FLAT_FILE_LISTINGS_DATA',
        'POST_FLAT_FILE_PRICEANDQUANTITYONLY_UPDATE_DATA',
        'POST_UIEE_BOOKLOADER_DATA',
        'POST_STD_ACES_DATA',
        // Order feeds
        'POST_ORDER_ACKNOWLEDGEMENT_DATA',
        'POST_PAYMENT_ADJUSTMENT_DATA',
        'POST_ORDER_FULFILLMENT_DATA',
        'POST_INVOICE_CONFIRMATION_DATA',
        'POST_EXPECTED_SHIP_DATE_SOD',
        'POST_FLAT_FILE_ORDER_ACKNOWLEDGEMENT_DATA',
        'POST_FLAT_FILE_PAYMENT_ADJUSTMENT_DATA',
        'POST_FLAT_FILE_FULFILLMENT_DATA',
        'POST_EXPECTED_SHIP_DATE_SOD_FLAT_FILE',
        // Fulfillment by Amazon feeds
        'POST_FULFILLMENT_ORDER_REQUEST_DATA',
        'POST_FULFILLMENT_ORDER_CANCELLATION_REQUEST_DATA',
        'POST_FBA_INBOUND_CARTON_CONTENTS',
        'POST_FLAT_FILE_FULFILLMENT_ORDER_REQUEST_DATA',
        'POST_FLAT_FILE_FULFILLMENT_ORDER_CANCELLATION_REQUEST_DATA',
        'POST_FLAT_FILE_FBA_CREATE_INBOUND_PLAN',
        'POST_FLAT_FILE_FBA_UPDATE_INBOUND_PLAN',
        'POST_FLAT_FILE_FBA_CREATE_REMOVAL',
        // Business feeds
        'RFQ_UPLOAD_FEED',
        // Easy Ship feeds
        'POST_EASYSHIP_DOCUMENTS',
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

    const PAGE_TYPES = [
        'PackageLabel_Letter_2',
        'PackageLabel_Letter_4',
        'PackageLabel_Letter_6',
        'PackageLabel_Letter_6_CarrierLeft',
        'PackageLabel_A4_2',
        'PackageLabel_A4_4',
        'PackageLabel_Plain_Paper',
        'PackageLabel_Plain_Paper_CarrierBottom',
        'PackageLabel_Thermal',
        'PackageLabel_Thermal_Unified',
        'PackageLabel_Thermal_NonPCP',
        'PackageLabel_Thermal_No_Carrier_Rotation',
    ];

    const BOX_CONTENTS_SOURCES = [
        'NONE',
        'FEED',
        '2D_BARCODE',
        'INTERACTIVE',
    ];

    const PROCESSING_STATUSES = [
        'CANCELLED',
        'DONE',
        'FATAL',
        'IN_PROGRESS',
        'IN_QUEUE',
    ];
}
