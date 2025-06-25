<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

enum NotificationType: string
{
    case OrderChange = 'ORDER_CHANGE';
    case FeedProcessingFinished = 'FEED_PROCESSING_FINISHED';
    case ReportProcessingFinished = 'REPORT_PROCESSING_FINISHED';
    case ListingsItemStatusChange = 'LISTINGS_ITEM_STATUS_CHANGE';
    case AnyOfferChanged = 'ANY_OFFER_CHANGED';
    case FbaOutboundShipmentStatus = 'FBA_OUTBOUND_SHIPMENT_STATUS';
    case FeePromotion = 'FEE_PROMOTION';
    case FulfillmentOrderStatus = 'FULFILLMENT_ORDER_STATUS';
    case BrandedItemContentChange = 'BRANDED_ITEM_CONTENT_CHANGE';
    case ItemProductTypeChange = 'ITEM_PRODUCT_TYPE_CHANGE';
    case ListingsItemIssuesChange = 'LISTINGS_ITEM_ISSUES_CHANGE';
    case B2bAnyOfferChanged = 'B2B_ANY_OFFER_CHANGED';
    case AccountStatusChanged = 'ACCOUNT_STATUS_CHANGED';
    case DetailPageTrafficEvent = 'DETAIL_PAGE_TRAFFIC_EVENT';
    case FbaInventoryAvailabilityChanges = 'FBA_INVENTORY_AVAILABILITY_CHANGES';
    case ItemInventoryEventChange = 'ITEM_INVENTORY_EVENT_CHANGE';
    case ItemSalesEventChange = 'ITEM_SALES_EVENT_CHANGE';
    case ProductTypeDefinitionsChange = 'PRODUCT_TYPE_DEFINITIONS_CHANGE';
    case ListingsItemMfnQuantityChange = 'LISTINGS_ITEM_MFN_QUANTITY_CHANGE';
    case PricingHealth = 'PRICING_HEALTH';
    case TransactionUpdate = 'TRANSACTION_UPDATE';
}
