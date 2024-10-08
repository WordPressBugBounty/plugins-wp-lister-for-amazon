<?php
namespace Aws\WAFV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS WAFV2** service.
 * @method \Aws\Result associateWebACL(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise associateWebACLAsync(array $args = [])
 * @method \Aws\Result checkCapacity(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise checkCapacityAsync(array $args = [])
 * @method \Aws\Result createIPSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createIPSetAsync(array $args = [])
 * @method \Aws\Result createRegexPatternSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createRegexPatternSetAsync(array $args = [])
 * @method \Aws\Result createRuleGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createRuleGroupAsync(array $args = [])
 * @method \Aws\Result createWebACL(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createWebACLAsync(array $args = [])
 * @method \Aws\Result deleteFirewallManagerRuleGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteFirewallManagerRuleGroupsAsync(array $args = [])
 * @method \Aws\Result deleteIPSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteIPSetAsync(array $args = [])
 * @method \Aws\Result deleteLoggingConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteLoggingConfigurationAsync(array $args = [])
 * @method \Aws\Result deletePermissionPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deletePermissionPolicyAsync(array $args = [])
 * @method \Aws\Result deleteRegexPatternSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteRegexPatternSetAsync(array $args = [])
 * @method \Aws\Result deleteRuleGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteRuleGroupAsync(array $args = [])
 * @method \Aws\Result deleteWebACL(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteWebACLAsync(array $args = [])
 * @method \Aws\Result describeManagedRuleGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeManagedRuleGroupAsync(array $args = [])
 * @method \Aws\Result disassociateWebACL(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disassociateWebACLAsync(array $args = [])
 * @method \Aws\Result generateMobileSdkReleaseUrl(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise generateMobileSdkReleaseUrlAsync(array $args = [])
 * @method \Aws\Result getIPSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getIPSetAsync(array $args = [])
 * @method \Aws\Result getLoggingConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getLoggingConfigurationAsync(array $args = [])
 * @method \Aws\Result getManagedRuleSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getManagedRuleSetAsync(array $args = [])
 * @method \Aws\Result getMobileSdkRelease(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMobileSdkReleaseAsync(array $args = [])
 * @method \Aws\Result getPermissionPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getPermissionPolicyAsync(array $args = [])
 * @method \Aws\Result getRateBasedStatementManagedKeys(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getRateBasedStatementManagedKeysAsync(array $args = [])
 * @method \Aws\Result getRegexPatternSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getRegexPatternSetAsync(array $args = [])
 * @method \Aws\Result getRuleGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getRuleGroupAsync(array $args = [])
 * @method \Aws\Result getSampledRequests(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getSampledRequestsAsync(array $args = [])
 * @method \Aws\Result getWebACL(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getWebACLAsync(array $args = [])
 * @method \Aws\Result getWebACLForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getWebACLForResourceAsync(array $args = [])
 * @method \Aws\Result listAvailableManagedRuleGroupVersions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAvailableManagedRuleGroupVersionsAsync(array $args = [])
 * @method \Aws\Result listAvailableManagedRuleGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAvailableManagedRuleGroupsAsync(array $args = [])
 * @method \Aws\Result listIPSets(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listIPSetsAsync(array $args = [])
 * @method \Aws\Result listLoggingConfigurations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listLoggingConfigurationsAsync(array $args = [])
 * @method \Aws\Result listManagedRuleSets(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listManagedRuleSetsAsync(array $args = [])
 * @method \Aws\Result listMobileSdkReleases(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listMobileSdkReleasesAsync(array $args = [])
 * @method \Aws\Result listRegexPatternSets(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listRegexPatternSetsAsync(array $args = [])
 * @method \Aws\Result listResourcesForWebACL(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listResourcesForWebACLAsync(array $args = [])
 * @method \Aws\Result listRuleGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listRuleGroupsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result listWebACLs(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listWebACLsAsync(array $args = [])
 * @method \Aws\Result putLoggingConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putLoggingConfigurationAsync(array $args = [])
 * @method \Aws\Result putManagedRuleSetVersions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putManagedRuleSetVersionsAsync(array $args = [])
 * @method \Aws\Result putPermissionPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putPermissionPolicyAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateIPSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateIPSetAsync(array $args = [])
 * @method \Aws\Result updateManagedRuleSetVersionExpiryDate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateManagedRuleSetVersionExpiryDateAsync(array $args = [])
 * @method \Aws\Result updateRegexPatternSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateRegexPatternSetAsync(array $args = [])
 * @method \Aws\Result updateRuleGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateRuleGroupAsync(array $args = [])
 * @method \Aws\Result updateWebACL(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateWebACLAsync(array $args = [])
 */
class WAFV2Client extends AwsClient {}
