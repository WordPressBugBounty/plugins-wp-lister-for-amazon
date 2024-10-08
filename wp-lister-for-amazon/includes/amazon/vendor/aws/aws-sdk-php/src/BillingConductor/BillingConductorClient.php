<?php
namespace Aws\BillingConductor;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWSBillingConductor** service.
 * @method \Aws\Result associateAccounts(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise associateAccountsAsync(array $args = [])
 * @method \Aws\Result associatePricingRules(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise associatePricingRulesAsync(array $args = [])
 * @method \Aws\Result batchAssociateResourcesToCustomLineItem(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchAssociateResourcesToCustomLineItemAsync(array $args = [])
 * @method \Aws\Result batchDisassociateResourcesFromCustomLineItem(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchDisassociateResourcesFromCustomLineItemAsync(array $args = [])
 * @method \Aws\Result createBillingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createBillingGroupAsync(array $args = [])
 * @method \Aws\Result createCustomLineItem(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createCustomLineItemAsync(array $args = [])
 * @method \Aws\Result createPricingPlan(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createPricingPlanAsync(array $args = [])
 * @method \Aws\Result createPricingRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createPricingRuleAsync(array $args = [])
 * @method \Aws\Result deleteBillingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteBillingGroupAsync(array $args = [])
 * @method \Aws\Result deleteCustomLineItem(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteCustomLineItemAsync(array $args = [])
 * @method \Aws\Result deletePricingPlan(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deletePricingPlanAsync(array $args = [])
 * @method \Aws\Result deletePricingRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deletePricingRuleAsync(array $args = [])
 * @method \Aws\Result disassociateAccounts(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disassociateAccountsAsync(array $args = [])
 * @method \Aws\Result disassociatePricingRules(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disassociatePricingRulesAsync(array $args = [])
 * @method \Aws\Result listAccountAssociations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAccountAssociationsAsync(array $args = [])
 * @method \Aws\Result listBillingGroupCostReports(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listBillingGroupCostReportsAsync(array $args = [])
 * @method \Aws\Result listBillingGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listBillingGroupsAsync(array $args = [])
 * @method \Aws\Result listCustomLineItems(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listCustomLineItemsAsync(array $args = [])
 * @method \Aws\Result listPricingPlans(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listPricingPlansAsync(array $args = [])
 * @method \Aws\Result listPricingPlansAssociatedWithPricingRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listPricingPlansAssociatedWithPricingRuleAsync(array $args = [])
 * @method \Aws\Result listPricingRules(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listPricingRulesAsync(array $args = [])
 * @method \Aws\Result listPricingRulesAssociatedToPricingPlan(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listPricingRulesAssociatedToPricingPlanAsync(array $args = [])
 * @method \Aws\Result listResourcesAssociatedToCustomLineItem(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listResourcesAssociatedToCustomLineItemAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateBillingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateBillingGroupAsync(array $args = [])
 * @method \Aws\Result updateCustomLineItem(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateCustomLineItemAsync(array $args = [])
 * @method \Aws\Result updatePricingPlan(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updatePricingPlanAsync(array $args = [])
 * @method \Aws\Result updatePricingRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updatePricingRuleAsync(array $args = [])
 */
class BillingConductorClient extends AwsClient {}
