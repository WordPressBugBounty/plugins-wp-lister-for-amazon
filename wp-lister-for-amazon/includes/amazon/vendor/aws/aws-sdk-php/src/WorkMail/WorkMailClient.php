<?php
namespace Aws\WorkMail;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon WorkMail** service.
 * @method \Aws\Result associateDelegateToResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise associateDelegateToResourceAsync(array $args = [])
 * @method \Aws\Result associateMemberToGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise associateMemberToGroupAsync(array $args = [])
 * @method \Aws\Result cancelMailboxExportJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelMailboxExportJobAsync(array $args = [])
 * @method \Aws\Result createAlias(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createAliasAsync(array $args = [])
 * @method \Aws\Result createAvailabilityConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createAvailabilityConfigurationAsync(array $args = [])
 * @method \Aws\Result createGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createGroupAsync(array $args = [])
 * @method \Aws\Result createMobileDeviceAccessRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createMobileDeviceAccessRuleAsync(array $args = [])
 * @method \Aws\Result createOrganization(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createOrganizationAsync(array $args = [])
 * @method \Aws\Result createResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createResourceAsync(array $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createUserAsync(array $args = [])
 * @method \Aws\Result deleteAccessControlRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteAccessControlRuleAsync(array $args = [])
 * @method \Aws\Result deleteAlias(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteAliasAsync(array $args = [])
 * @method \Aws\Result deleteAvailabilityConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteAvailabilityConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteEmailMonitoringConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteEmailMonitoringConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @method \Aws\Result deleteMailboxPermissions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteMailboxPermissionsAsync(array $args = [])
 * @method \Aws\Result deleteMobileDeviceAccessOverride(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteMobileDeviceAccessOverrideAsync(array $args = [])
 * @method \Aws\Result deleteMobileDeviceAccessRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteMobileDeviceAccessRuleAsync(array $args = [])
 * @method \Aws\Result deleteOrganization(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteOrganizationAsync(array $args = [])
 * @method \Aws\Result deleteResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteResourceAsync(array $args = [])
 * @method \Aws\Result deleteRetentionPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteRetentionPolicyAsync(array $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @method \Aws\Result deregisterFromWorkMail(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deregisterFromWorkMailAsync(array $args = [])
 * @method \Aws\Result deregisterMailDomain(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deregisterMailDomainAsync(array $args = [])
 * @method \Aws\Result describeEmailMonitoringConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeEmailMonitoringConfigurationAsync(array $args = [])
 * @method \Aws\Result describeGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeGroupAsync(array $args = [])
 * @method \Aws\Result describeInboundDmarcSettings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeInboundDmarcSettingsAsync(array $args = [])
 * @method \Aws\Result describeMailboxExportJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeMailboxExportJobAsync(array $args = [])
 * @method \Aws\Result describeOrganization(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeOrganizationAsync(array $args = [])
 * @method \Aws\Result describeResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeResourceAsync(array $args = [])
 * @method \Aws\Result describeUser(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeUserAsync(array $args = [])
 * @method \Aws\Result disassociateDelegateFromResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disassociateDelegateFromResourceAsync(array $args = [])
 * @method \Aws\Result disassociateMemberFromGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disassociateMemberFromGroupAsync(array $args = [])
 * @method \Aws\Result getAccessControlEffect(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getAccessControlEffectAsync(array $args = [])
 * @method \Aws\Result getDefaultRetentionPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDefaultRetentionPolicyAsync(array $args = [])
 * @method \Aws\Result getMailDomain(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMailDomainAsync(array $args = [])
 * @method \Aws\Result getMailboxDetails(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMailboxDetailsAsync(array $args = [])
 * @method \Aws\Result getMobileDeviceAccessEffect(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMobileDeviceAccessEffectAsync(array $args = [])
 * @method \Aws\Result getMobileDeviceAccessOverride(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMobileDeviceAccessOverrideAsync(array $args = [])
 * @method \Aws\Result listAccessControlRules(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAccessControlRulesAsync(array $args = [])
 * @method \Aws\Result listAliases(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAliasesAsync(array $args = [])
 * @method \Aws\Result listAvailabilityConfigurations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAvailabilityConfigurationsAsync(array $args = [])
 * @method \Aws\Result listGroupMembers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listGroupMembersAsync(array $args = [])
 * @method \Aws\Result listGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @method \Aws\Result listMailDomains(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listMailDomainsAsync(array $args = [])
 * @method \Aws\Result listMailboxExportJobs(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listMailboxExportJobsAsync(array $args = [])
 * @method \Aws\Result listMailboxPermissions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listMailboxPermissionsAsync(array $args = [])
 * @method \Aws\Result listMobileDeviceAccessOverrides(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listMobileDeviceAccessOverridesAsync(array $args = [])
 * @method \Aws\Result listMobileDeviceAccessRules(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listMobileDeviceAccessRulesAsync(array $args = [])
 * @method \Aws\Result listOrganizations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listOrganizationsAsync(array $args = [])
 * @method \Aws\Result listResourceDelegates(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listResourceDelegatesAsync(array $args = [])
 * @method \Aws\Result listResources(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listResourcesAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listUsersAsync(array $args = [])
 * @method \Aws\Result putAccessControlRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putAccessControlRuleAsync(array $args = [])
 * @method \Aws\Result putEmailMonitoringConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putEmailMonitoringConfigurationAsync(array $args = [])
 * @method \Aws\Result putInboundDmarcSettings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putInboundDmarcSettingsAsync(array $args = [])
 * @method \Aws\Result putMailboxPermissions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putMailboxPermissionsAsync(array $args = [])
 * @method \Aws\Result putMobileDeviceAccessOverride(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putMobileDeviceAccessOverrideAsync(array $args = [])
 * @method \Aws\Result putRetentionPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putRetentionPolicyAsync(array $args = [])
 * @method \Aws\Result registerMailDomain(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise registerMailDomainAsync(array $args = [])
 * @method \Aws\Result registerToWorkMail(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise registerToWorkMailAsync(array $args = [])
 * @method \Aws\Result resetPassword(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise resetPasswordAsync(array $args = [])
 * @method \Aws\Result startMailboxExportJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startMailboxExportJobAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result testAvailabilityConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise testAvailabilityConfigurationAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateAvailabilityConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateAvailabilityConfigurationAsync(array $args = [])
 * @method \Aws\Result updateDefaultMailDomain(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateDefaultMailDomainAsync(array $args = [])
 * @method \Aws\Result updateMailboxQuota(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateMailboxQuotaAsync(array $args = [])
 * @method \Aws\Result updateMobileDeviceAccessRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateMobileDeviceAccessRuleAsync(array $args = [])
 * @method \Aws\Result updatePrimaryEmailAddress(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updatePrimaryEmailAddressAsync(array $args = [])
 * @method \Aws\Result updateResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateResourceAsync(array $args = [])
 */
class WorkMailClient extends AwsClient {}
