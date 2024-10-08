<?php
namespace Aws\NetworkFirewall;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Network Firewall** service.
 * @method \Aws\Result associateFirewallPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise associateFirewallPolicyAsync(array $args = [])
 * @method \Aws\Result associateSubnets(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise associateSubnetsAsync(array $args = [])
 * @method \Aws\Result createFirewall(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createFirewallAsync(array $args = [])
 * @method \Aws\Result createFirewallPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createFirewallPolicyAsync(array $args = [])
 * @method \Aws\Result createRuleGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createRuleGroupAsync(array $args = [])
 * @method \Aws\Result deleteFirewall(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteFirewallAsync(array $args = [])
 * @method \Aws\Result deleteFirewallPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteFirewallPolicyAsync(array $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @method \Aws\Result deleteRuleGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteRuleGroupAsync(array $args = [])
 * @method \Aws\Result describeFirewall(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeFirewallAsync(array $args = [])
 * @method \Aws\Result describeFirewallPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeFirewallPolicyAsync(array $args = [])
 * @method \Aws\Result describeLoggingConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeLoggingConfigurationAsync(array $args = [])
 * @method \Aws\Result describeResourcePolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeResourcePolicyAsync(array $args = [])
 * @method \Aws\Result describeRuleGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeRuleGroupAsync(array $args = [])
 * @method \Aws\Result describeRuleGroupMetadata(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeRuleGroupMetadataAsync(array $args = [])
 * @method \Aws\Result disassociateSubnets(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disassociateSubnetsAsync(array $args = [])
 * @method \Aws\Result listFirewallPolicies(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listFirewallPoliciesAsync(array $args = [])
 * @method \Aws\Result listFirewalls(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listFirewallsAsync(array $args = [])
 * @method \Aws\Result listRuleGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listRuleGroupsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateFirewallDeleteProtection(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateFirewallDeleteProtectionAsync(array $args = [])
 * @method \Aws\Result updateFirewallDescription(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateFirewallDescriptionAsync(array $args = [])
 * @method \Aws\Result updateFirewallEncryptionConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateFirewallEncryptionConfigurationAsync(array $args = [])
 * @method \Aws\Result updateFirewallPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateFirewallPolicyAsync(array $args = [])
 * @method \Aws\Result updateFirewallPolicyChangeProtection(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateFirewallPolicyChangeProtectionAsync(array $args = [])
 * @method \Aws\Result updateLoggingConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateLoggingConfigurationAsync(array $args = [])
 * @method \Aws\Result updateRuleGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateRuleGroupAsync(array $args = [])
 * @method \Aws\Result updateSubnetChangeProtection(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateSubnetChangeProtectionAsync(array $args = [])
 */
class NetworkFirewallClient extends AwsClient {}
