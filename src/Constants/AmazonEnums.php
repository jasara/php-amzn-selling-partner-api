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

    const REPORT_TYPES = [
        // Vendor retail analytics reports
        'GET_VENDOR_SALES_DIAGNOSTIC_REPORT',
        'GET_VENDOR_INVENTORY_HEALTH_AND_PLANNING_REPORT',
        'GET_VENDOR_DEMAND_FORECAST_REPORT',
        // Inventory reports
        'GET_FLAT_FILE_OPEN_LISTINGS_DATA',
        'GET_MERCHANT_LISTINGS_ALL_DATA',
        'GET_MERCHANT_LISTINGS_DATA',
        'GET_MERCHANT_LISTINGS_INACTIVE_DATA',
        'GET_MERCHANT_LISTINGS_DATA_BACK_COMPAT',
        'GET_MERCHANT_LISTINGS_DATA_LITE',
        'GET_MERCHANT_LISTINGS_DATA_LITER',
        'GET_MERCHANT_CANCELLED_LISTINGS_DATA',
        'GET_MERCHANT_LISTINGS_DEFECT_DATA',
        'GET_PAN_EU_OFFER_STATUS',
        'GET_MFN_PAN_EU_OFFER_STATUS',
        'GET_REFERRAL_FEE_PREVIEW_REPORT',
        // Order reports
        'GET_FLAT_FILE_ACTIONABLE_ORDER_DATA_SHIPPING',
        'GET_ORDER_REPORT_DATA_INVOICING',
        'GET_ORDER_REPORT_DATA_TAX',
        'GET_ORDER_REPORT_DATA_SHIPPING',
        'GET_FLAT_FILE_ORDER_REPORT_DATA_INVOICING',
        'GET_FLAT_FILE_ORDER_REPORT_DATA_SHIPPING',
        'GET_FLAT_FILE_ORDER_REPORT_DATA_TAX',
        // Order tracking reports
        'GET_FLAT_FILE_ALL_ORDERS_DATA_BY_LAST_UPDATE_GENERAL',
        'GET_FLAT_FILE_ALL_ORDERS_DATA_BY_ORDER_DATE_GENERAL',
        'GET_FLAT_FILE_ARCHIVED_ORDERS_DATA_BY_ORDER_DATE',
        'GET_XML_ALL_ORDERS_DATA_BY_LAST_UPDATE_GENERAL',
        'GET_XML_ALL_ORDERS_DATA_BY_ORDER_DATE_GENERAL',
        // Pending order reports
        'GET_FLAT_FILE_PENDING_ORDERS_DATA',
        'GET_PENDING_ORDERS_DATA',
        'GET_CONVERGED_FLAT_FILE_PENDING_ORDERS_DATA',
        // Returns reports
        'GET_XML_RETURNS_DATA_BY_RETURN_DATE',
        'GET_FLAT_FILE_RETURNS_DATA_BY_RETURN_DATE',
        'GET_XML_MFN_PRIME_RETURNS_REPORT',
        'GET_CSV_MFN_PRIME_RETURNS_REPORT',
        'GET_XML_MFN_SKU_RETURN_ATTRIBUTES_REPORT',
        'GET_FLAT_FILE_MFN_SKU_RETURN_ATTRIBUTES_REPORT',
        // Performance reports
        'GET_SELLER_FEEDBACK_DATA',
        'GET_V1_SELLER_PERFORMANCE_REPORT',
        'GET_V2_SELLER_PERFORMANCE_REPORT',
        // Settlement reports
        'GET_V2_SETTLEMENT_REPORT_DATA_FLAT_FILE',
        'GET_V2_SETTLEMENT_REPORT_DATA_XML',
        'GET_V2_SETTLEMENT_REPORT_DATA_FLAT_FILE_V2',
        // FBA reports
        // FBA Sales reports
        'GET_AMAZON_FULFILLED_SHIPMENTS_DATA_GENERAL',
        'GET_AMAZON_FULFILLED_SHIPMENTS_DATA_INVOICING',
        'GET_AMAZON_FULFILLED_SHIPMENTS_DATA_TAX',
        'GET_FLAT_FILE_ALL_ORDERS_DATA_BY_LAST_UPDATE_GENERAL',
        'GET_FLAT_FILE_ALL_ORDERS_DATA_BY_ORDER_DATE_GENERAL',
        'GET_XML_ALL_ORDERS_DATA_BY_LAST_UPDATE_GENERAL',
        'GET_XML_ALL_ORDERS_DATA_BY_ORDER_DATE_GENERAL',
        'GET_FBA_FULFILLMENT_CUSTOMER_SHIPMENT_SALES_DATA',
        'GET_FBA_FULFILLMENT_CUSTOMER_SHIPMENT_PROMOTION_DATA',
        'GET_FBA_FULFILLMENT_CUSTOMER_TAXES_DATA',
        'GET_REMOTE_FULFILLMENT_ELIGIBILITY',
        // FBA Inventory reports
        'GET_AFN_INVENTORY_DATA',
        'GET_AFN_INVENTORY_DATA_BY_COUNTRY',
        'GET_LEDGER_SUMMARY_VIEW_DATA',
        'GET_LEDGER_DETAIL_VIEW_DATA',
        'GET_FBA_FULFILLMENT_CURRENT_INVENTORY_DATA',
        'GET_FBA_FULFILLMENT_MONTHLY_INVENTORY_DATA',
        'GET_FBA_FULFILLMENT_INVENTORY_RECEIPTS_DATA',
        'GET_RESERVED_INVENTORY_DATA',
        'GET_FBA_FULFILLMENT_INVENTORY_SUMMARY_DATA',
        'GET_FBA_FULFILLMENT_INVENTORY_ADJUSTMENTS_DATA',
        'GET_FBA_FULFILLMENT_INVENTORY_HEALTH_DATA',
        'GET_FBA_MYI_UNSUPPRESSED_INVENTORY_DATA',
        'GET_FBA_MYI_ALL_INVENTORY_DATA',
        'GET_RESTOCK_INVENTORY_RECOMMENDATIONS_REPORT',
        'GET_FBA_FULFILLMENT_INBOUND_NONCOMPLIANCE_DATA',
        'GET_STRANDED_INVENTORY_UI_DATA',
        'GET_STRANDED_INVENTORY_LOADER_DATA',
        'GET_FBA_INVENTORY_AGED_DATA',
        'GET_EXCESS_INVENTORY_DATA',
        'GET_FBA_STORAGE_FEE_CHARGES_DATA',
        'GET_PRODUCT_EXCHANGE_DATA',
        // FBA Payments reports
        'GET_FBA_ESTIMATED_FBA_FEES_TXT_DATA',
        'GET_FBA_REIMBURSEMENTS_DATA',
        'GET_FBA_FULFILLMENT_LONGTERM_STORAGE_FEE_CHARGES_DATA',
        // FBA Customer Concessions reports
        'GET_FBA_FULFILLMENT_CUSTOMER_RETURNS_DATA',
        'GET_FBA_FULFILLMENT_CUSTOMER_SHIPMENT_REPLACEMENT_DATA',
        // FBA Removals report
        'GET_FBA_RECOMMENDED_REMOVAL_DATA',
        'GET_FBA_FULFILLMENT_REMOVAL_ORDER_DETAIL_DATA',
        'GET_FBA_FULFILLMENT_REMOVAL_SHIPMENT_DETAIL_DATA',
        // FBA Small and Light reports
        'GET_FBA_UNO_INVENTORY_DATA',
        // Tax reports
        'GET_FLAT_FILE_SALES_TAX_DATA',
        'SC_VAT_TAX_REPORT',
        'GET_VAT_TRANSACTION_DATA',
        'GET_GST_MTR_B2B_CUSTOM',
        'GET_GST_MTR_B2C_CUSTOM',
        // Browse tree report
        'GET_XML_BROWSE_TREE_DATA',
        // Easy ship reports
        'GET_EASYSHIP_DOCUMENTS',
        'GET_EASYSHIP_PICKEDUP',
        'GET_EASYSHIP_WAITING_FOR_PICKUP',
        // Amazon business reports
        'RFQD_BULK_DOWNLOAD',
        'FEE_DISCOUNTS_REPORT',
        // Amazon pay reports
        'GET_FLAT_FILE_OFFAMAZONPAYMENTS_SANDBOX_SETTLEMENT_DATA',
        // B2B Product opportunities reports
        'GET_B2B_PRODUCT_OPPORTUNITIES_RECOMMENDED_FOR_YOU',
        'GET_B2B_PRODUCT_OPPORTUNITIES_NOT_YET_ON_AMAZON',
    ];

    const REPORT_PERIODS = [
        'PT5M',
        'PT15M',
        'PT30M',
        'PT1H',
        'PT2H',
        'PT4H',
        'PT8H',
        'PT12H',
        'P1D',
        'P2D',
        'P3D',
        'PT84H',
        'P7D',
        'P14D',
        'P15D',
        'P18D',
        'P30D',
        'P1M',
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

    const INCLUDED_DATA_ITEMS = [
        'attributes',
        'identifiers',
        'images',
        'productTypes',
        'salesRanks',
        'summaries',
        'variations',
        'vendorDetails',
    ];

    const IMAGE_VARIANTS = [
        'MAIN',
        'PT01',
        'PT02',
        'PT03',
        'PT04',
        'PT05',
        'PT06',
        'PT07',
        'PT08',
        'SWCH',
    ];

    const REPLENISHMENT_CATEGORIES = [
        'ALLOCATED',
        'BASIC_REPLENISHMENT',
        'IN_SEASON',
        'LIMITED_REPLENISHMENT',
        'MANUFACTURER_OUT_OF_STOCK',
        'NEW_PRODUCT',
        'NON_REPLENISHABLE',
        'NON_STOCKUPABLE',
        'OBSOLETE',
        'PLANNED_REPLENISHMENT',
    ];
}
