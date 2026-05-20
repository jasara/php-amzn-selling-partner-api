<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class ResourceGetter
{
    use ValidatesParameters;

    public function __construct(
        private AmznSPAConfig $config,
    ) {}

    public function getLwa(): LwaResource
    {
        $this->validateObjectProperties($this->config->getApplicationKeys(), ['lwa_client_id', 'lwa_client_secret']);

        return new LwaResource(
            $this->config->getHttp(),
            $this->config->getMarketplace(),
            $this->config->getRedirectUrl(),
            $this->config->getApplicationKeys(),
            $this->config->getSaveLwaTokensCallback(),
            $this->config->getAuthenticationExceptionCallback(),
            $this->config->getResponseCallback(),
        );
    }

    public function getNotifications(): NotificationsResource
    {
        return $this->constructResource(NotificationsResource::class, 'notifications');
    }

    public function getAplusContent(): AplusContentResource
    {
        return $this->constructResource(AplusContentResource::class);
    }

    public function getFinances(): FinancesResource
    {
        return $this->constructResource(FinancesResource::class);
    }

    public function getFinancesV0(): FinancesV0Resource
    {
        return $this->constructResource(FinancesV0Resource::class);
    }

    public function getTransfers(): TransfersResource
    {
        return $this->constructResource(TransfersResource::class);
    }

    public function getListingsRestrictions(): ListingsRestrictionsResource
    {
        return $this->constructResource(ListingsRestrictionsResource::class);
    }

    public function getMessaging(): MessagingResource
    {
        return $this->constructResource(MessagingResource::class);
    }

    public function getSales(): SalesResource
    {
        return $this->constructResource(SalesResource::class);
    }

    public function getServices(): ServicesResource
    {
        return $this->constructResource(ServicesResource::class);
    }

    public function getShipmentInvoicing(): ShipmentInvoicingResource
    {
        return $this->constructResource(ShipmentInvoicingResource::class);
    }

    public function getSolicitations(): SolicitationsResource
    {
        return $this->constructResource(SolicitationsResource::class);
    }

    public function getVendorDirectFulfillmentInventory(): VendorDirectFulfillmentInventoryResource
    {
        return $this->constructResource(VendorDirectFulfillmentInventoryResource::class);
    }

    public function getVendorDirectFulfillmentOrders(): VendorDirectFulfillmentOrdersResource
    {
        return $this->constructResource(VendorDirectFulfillmentOrdersResource::class);
    }

    public function getVendorDirectFulfillmentOrders20211228(): VendorDirectFulfillmentOrders20211228Resource
    {
        return $this->constructResource(VendorDirectFulfillmentOrders20211228Resource::class);
    }

    public function getVendorDirectFulfillmentPayments(): VendorDirectFulfillmentPaymentsResource
    {
        return $this->constructResource(VendorDirectFulfillmentPaymentsResource::class);
    }

    public function getVendorDirectFulfillmentShipping(): VendorDirectFulfillmentShippingResource
    {
        return $this->constructResource(VendorDirectFulfillmentShippingResource::class);
    }

    public function getVendorDirectFulfillmentShipping20211228(): VendorDirectFulfillmentShipping20211228Resource
    {
        return $this->constructResource(VendorDirectFulfillmentShipping20211228Resource::class);
    }

    public function getVendorDirectFulfillmentTransactions(): VendorDirectFulfillmentTransactionsResource
    {
        return $this->constructResource(VendorDirectFulfillmentTransactionsResource::class);
    }

    public function getVendorDirectFulfillmentTransactions20211228(): VendorDirectFulfillmentTransactions20211228Resource
    {
        return $this->constructResource(VendorDirectFulfillmentTransactions20211228Resource::class);
    }

    public function getVendorInvoices(): VendorInvoicesResource
    {
        return $this->constructResource(VendorInvoicesResource::class);
    }

    public function getVendorOrders(): VendorOrdersResource
    {
        return $this->constructResource(VendorOrdersResource::class);
    }

    public function getVendorShipments(): VendorShipmentsResource
    {
        return $this->constructResource(VendorShipmentsResource::class);
    }

    public function getVendorTransactionStatus(): VendorTransactionStatusResource
    {
        return $this->constructResource(VendorTransactionStatusResource::class);
    }

    public function getFulfillmentInbound(): FulfillmentInbound\FulfillmentInboundV0Resource
    {
        return $this->constructResource(FulfillmentInbound\FulfillmentInboundV0Resource::class);
    }

    public function getFulfillmentInboundV0(): FulfillmentInbound\FulfillmentInboundV0Resource
    {
        return $this->constructResource(FulfillmentInbound\FulfillmentInboundV0Resource::class);
    }

    public function getFulfillmentInbound20240320(): FulfillmentInbound\FulfillmentInbound20240320Resource
    {
        return $this->constructResource(FulfillmentInbound\FulfillmentInbound20240320Resource::class);
    }

    public function getFeeds(): FeedsResource
    {
        return $this->constructResource(FeedsResource::class);
    }

    public function getReports(): ReportsResource
    {
        return $this->constructResource(ReportsResource::class);
    }

    public function getCatalogItems(): CatalogItems\CatalogItems20201201Resource
    {
        return $this->constructResource(CatalogItems\CatalogItems20201201Resource::class);
    }

    public function getCatalogItems20201201(): CatalogItems\CatalogItems20201201Resource
    {
        return $this->constructResource(CatalogItems\CatalogItems20201201Resource::class);
    }

    public function getCatalogItems20220401(): CatalogItems\CatalogItems20220401Resource
    {
        return $this->constructResource(CatalogItems\CatalogItems20220401Resource::class);
    }

    public function getFbaInventory(): FbaInventoryResource
    {
        return $this->constructResource(FbaInventoryResource::class);
    }

    public function getProductPricing(): ProductPricingResource
    {
        return $this->constructResource(ProductPricingResource::class);
    }

    public function getProductPricing20220501(): ProductPricing20220501Resource
    {
        return $this->constructResource(ProductPricing20220501Resource::class);
    }

    public function getFulfillmentOutbound(): FulfillmentOutboundResource
    {
        return $this->constructResource(FulfillmentOutboundResource::class);
    }

    public function getMerchantFulfillment(): MerchantFulfillmentResource
    {
        return $this->constructResource(MerchantFulfillmentResource::class);
    }

    public function getShipping(): ShippingResource
    {
        return $this->constructResource(ShippingResource::class);
    }

    public function getFbaInboundEligibility(): FbaInboundEligibilityResource
    {
        return $this->constructResource(FbaInboundEligibilityResource::class);
    }

    public function getOrders(): OrdersResource
    {
        return $this->constructResource(OrdersResource::class);
    }

    public function getOrders20260101(): Orders20260101Resource
    {
        return $this->constructResource(Orders20260101Resource::class);
    }

    public function getTokens(): TokensResource
    {
        return $this->constructResource(TokensResource::class);
    }

    public function getSellers(): SellersResource
    {
        return $this->constructResource(SellersResource::class);
    }

    public function getUploads(): UploadsResource
    {
        return $this->constructResource(UploadsResource::class);
    }

    public function getProductFees(): ProductFeesResource
    {
        return $this->constructResource(ProductFeesResource::class);
    }

    public function getProductTypeDefinitions(): ProductTypeDefinitionsResource
    {
        return $this->constructResource(ProductTypeDefinitionsResource::class);
    }

    public function getListingsItems(): ListingsItemsResource
    {
        return $this->constructResource(ListingsItemsResource::class);
    }

    private function constructResource(string $class, ?string $grantless_resource = null): ResourceContract
    {
        $url = $this->config->getProxy() ? $this->config->getProxy()->url : $this->config->getMarketplace()->getBaseUrl();

        return new $class(
            $this->validateAndSetupHttpForStandardResource($grantless_resource),
            $url,
        );
    }

    private function validateAndSetupHttpForStandardResource(?string $grantless_resource = null): AmznSPAHttp
    {
        if (! $this->config->getProxy()) {
            $this->validateObjectProperties($this->config->getApplicationKeys(), ['lwa_client_id', 'lwa_client_secret', 'aws_access_key', 'aws_secret_key']);

            if (! $grantless_resource) {
                $this->validateObjectProperties($this->config->getTokens(), ['refresh_token']);
            }
        }

        return new AmznSPAHttp($this->config, $grantless_resource);
    }
}
