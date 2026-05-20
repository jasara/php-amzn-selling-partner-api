<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FinancialEventsSchema extends BaseSchema
{
    public function __construct(
        public ?ShipmentEventListSchema $shipment_event_list = null,
        public ?ShipmentSettleEventListSchema $shipment_settle_event_list = null,
        public ?ShipmentEventListSchema $refund_event_list = null,
        public ?ShipmentEventListSchema $guarantee_claim_event_list = null,
        public ?EBTRefundReimbursementOnlyEventListSchema $ebt_refund_reimbursement_only_event_list = null,
        public ?ShipmentEventListSchema $chargeback_event_list = null,
        public ?PayWithAmazonEventListSchema $pay_with_amazon_event_list = null,
        public ?SolutionProviderCreditEventListSchema $service_provider_credit_event_list = null,
        public ?RetrochargeEventListSchema $retrocharge_event_list = null,
        public ?RentalTransactionEventListSchema $rental_transaction_event_list = null,
        public ?ProductAdsPaymentEventListSchema $product_ads_payment_event_list = null,
        public ?ServiceFeeEventListSchema $service_fee_event_list = null,
        public ?SellerDealPaymentEventListSchema $seller_deal_payment_event_list = null,
        public ?DebtRecoveryEventListSchema $debt_recovery_event_list = null,
        public ?LoanServicingEventListSchema $loan_servicing_event_list = null,
        public ?AdjustmentEventListSchema $adjustment_event_list = null,
        public ?SAFETReimbursementEventListSchema $safet_reimbursement_event_list = null,
        public ?SellerReviewEnrollmentPaymentEventListSchema $seller_review_enrollment_payment_event_list = null,
        public ?FBALiquidationEventListSchema $fba_liquidation_event_list = null,
        public ?CouponPaymentEventListSchema $coupon_payment_event_list = null,
        public ?ImagingServicesFeeEventListSchema $imaging_services_fee_event_list = null,
        public ?NetworkComminglingTransactionEventListSchema $network_commingling_transaction_event_list = null,
        public ?AffordabilityExpenseEventListSchema $affordability_expense_event_list = null,
        public ?AffordabilityExpenseEventListSchema $affordability_expense_reversal_event_list = null,
        public ?RemovalShipmentEventListSchema $removal_shipment_event_list = null,
        public ?RemovalShipmentAdjustmentEventListSchema $removal_shipment_adjustment_event_list = null,
        public ?TrialShipmentEventListSchema $trial_shipment_event_list = null,
        public ?TDSReimbursementEventListSchema $tds_reimbursement_event_list = null,
        public ?AdhocDisbursementEventListSchema $adhoc_disbursement_event_list = null,
        public ?TaxWithholdingEventListSchema $tax_withholding_event_list = null,
        public ?ChargeRefundEventListSchema $charge_refund_event_list = null,
        public ?FailedAdhocDisbursementEventListSchema $failed_adhoc_disbursement_event_list = null,
        public ?ValueAddedServiceChargeEventListSchema $value_added_service_charge_event_list = null,
        public ?CapacityReservationBillingEventListSchema $capacity_reservation_billing_event_list = null,
    ) {}
}
