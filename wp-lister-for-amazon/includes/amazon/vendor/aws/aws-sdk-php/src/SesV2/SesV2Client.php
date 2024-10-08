<?php
namespace Aws\SesV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Simple Email Service** service.
 * @method \Aws\Result createConfigurationSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createConfigurationSetAsync(array $args = [])
 * @method \Aws\Result createConfigurationSetEventDestination(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createConfigurationSetEventDestinationAsync(array $args = [])
 * @method \Aws\Result createContact(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createContactAsync(array $args = [])
 * @method \Aws\Result createContactList(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createContactListAsync(array $args = [])
 * @method \Aws\Result createCustomVerificationEmailTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createCustomVerificationEmailTemplateAsync(array $args = [])
 * @method \Aws\Result createDedicatedIpPool(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDedicatedIpPoolAsync(array $args = [])
 * @method \Aws\Result createDeliverabilityTestReport(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDeliverabilityTestReportAsync(array $args = [])
 * @method \Aws\Result createEmailIdentity(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createEmailIdentityAsync(array $args = [])
 * @method \Aws\Result createEmailIdentityPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createEmailIdentityPolicyAsync(array $args = [])
 * @method \Aws\Result createEmailTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createEmailTemplateAsync(array $args = [])
 * @method \Aws\Result createImportJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createImportJobAsync(array $args = [])
 * @method \Aws\Result deleteConfigurationSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteConfigurationSetAsync(array $args = [])
 * @method \Aws\Result deleteConfigurationSetEventDestination(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteConfigurationSetEventDestinationAsync(array $args = [])
 * @method \Aws\Result deleteContact(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteContactAsync(array $args = [])
 * @method \Aws\Result deleteContactList(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteContactListAsync(array $args = [])
 * @method \Aws\Result deleteCustomVerificationEmailTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteCustomVerificationEmailTemplateAsync(array $args = [])
 * @method \Aws\Result deleteDedicatedIpPool(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDedicatedIpPoolAsync(array $args = [])
 * @method \Aws\Result deleteEmailIdentity(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteEmailIdentityAsync(array $args = [])
 * @method \Aws\Result deleteEmailIdentityPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteEmailIdentityPolicyAsync(array $args = [])
 * @method \Aws\Result deleteEmailTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteEmailTemplateAsync(array $args = [])
 * @method \Aws\Result deleteSuppressedDestination(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteSuppressedDestinationAsync(array $args = [])
 * @method \Aws\Result getAccount(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getAccountAsync(array $args = [])
 * @method \Aws\Result getBlacklistReports(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getBlacklistReportsAsync(array $args = [])
 * @method \Aws\Result getConfigurationSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getConfigurationSetAsync(array $args = [])
 * @method \Aws\Result getConfigurationSetEventDestinations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getConfigurationSetEventDestinationsAsync(array $args = [])
 * @method \Aws\Result getContact(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getContactAsync(array $args = [])
 * @method \Aws\Result getContactList(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getContactListAsync(array $args = [])
 * @method \Aws\Result getCustomVerificationEmailTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getCustomVerificationEmailTemplateAsync(array $args = [])
 * @method \Aws\Result getDedicatedIp(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDedicatedIpAsync(array $args = [])
 * @method \Aws\Result getDedicatedIps(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDedicatedIpsAsync(array $args = [])
 * @method \Aws\Result getDeliverabilityDashboardOptions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDeliverabilityDashboardOptionsAsync(array $args = [])
 * @method \Aws\Result getDeliverabilityTestReport(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDeliverabilityTestReportAsync(array $args = [])
 * @method \Aws\Result getDomainDeliverabilityCampaign(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDomainDeliverabilityCampaignAsync(array $args = [])
 * @method \Aws\Result getDomainStatisticsReport(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDomainStatisticsReportAsync(array $args = [])
 * @method \Aws\Result getEmailIdentity(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getEmailIdentityAsync(array $args = [])
 * @method \Aws\Result getEmailIdentityPolicies(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getEmailIdentityPoliciesAsync(array $args = [])
 * @method \Aws\Result getEmailTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getEmailTemplateAsync(array $args = [])
 * @method \Aws\Result getImportJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getImportJobAsync(array $args = [])
 * @method \Aws\Result getSuppressedDestination(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getSuppressedDestinationAsync(array $args = [])
 * @method \Aws\Result listConfigurationSets(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listConfigurationSetsAsync(array $args = [])
 * @method \Aws\Result listContactLists(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listContactListsAsync(array $args = [])
 * @method \Aws\Result listContacts(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listContactsAsync(array $args = [])
 * @method \Aws\Result listCustomVerificationEmailTemplates(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listCustomVerificationEmailTemplatesAsync(array $args = [])
 * @method \Aws\Result listDedicatedIpPools(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDedicatedIpPoolsAsync(array $args = [])
 * @method \Aws\Result listDeliverabilityTestReports(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDeliverabilityTestReportsAsync(array $args = [])
 * @method \Aws\Result listDomainDeliverabilityCampaigns(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDomainDeliverabilityCampaignsAsync(array $args = [])
 * @method \Aws\Result listEmailIdentities(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listEmailIdentitiesAsync(array $args = [])
 * @method \Aws\Result listEmailTemplates(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listEmailTemplatesAsync(array $args = [])
 * @method \Aws\Result listImportJobs(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listImportJobsAsync(array $args = [])
 * @method \Aws\Result listSuppressedDestinations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listSuppressedDestinationsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result putAccountDedicatedIpWarmupAttributes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putAccountDedicatedIpWarmupAttributesAsync(array $args = [])
 * @method \Aws\Result putAccountDetails(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putAccountDetailsAsync(array $args = [])
 * @method \Aws\Result putAccountSendingAttributes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putAccountSendingAttributesAsync(array $args = [])
 * @method \Aws\Result putAccountSuppressionAttributes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putAccountSuppressionAttributesAsync(array $args = [])
 * @method \Aws\Result putConfigurationSetDeliveryOptions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putConfigurationSetDeliveryOptionsAsync(array $args = [])
 * @method \Aws\Result putConfigurationSetReputationOptions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putConfigurationSetReputationOptionsAsync(array $args = [])
 * @method \Aws\Result putConfigurationSetSendingOptions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putConfigurationSetSendingOptionsAsync(array $args = [])
 * @method \Aws\Result putConfigurationSetSuppressionOptions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putConfigurationSetSuppressionOptionsAsync(array $args = [])
 * @method \Aws\Result putConfigurationSetTrackingOptions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putConfigurationSetTrackingOptionsAsync(array $args = [])
 * @method \Aws\Result putDedicatedIpInPool(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putDedicatedIpInPoolAsync(array $args = [])
 * @method \Aws\Result putDedicatedIpWarmupAttributes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putDedicatedIpWarmupAttributesAsync(array $args = [])
 * @method \Aws\Result putDeliverabilityDashboardOption(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putDeliverabilityDashboardOptionAsync(array $args = [])
 * @method \Aws\Result putEmailIdentityConfigurationSetAttributes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putEmailIdentityConfigurationSetAttributesAsync(array $args = [])
 * @method \Aws\Result putEmailIdentityDkimAttributes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putEmailIdentityDkimAttributesAsync(array $args = [])
 * @method \Aws\Result putEmailIdentityDkimSigningAttributes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putEmailIdentityDkimSigningAttributesAsync(array $args = [])
 * @method \Aws\Result putEmailIdentityFeedbackAttributes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putEmailIdentityFeedbackAttributesAsync(array $args = [])
 * @method \Aws\Result putEmailIdentityMailFromAttributes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putEmailIdentityMailFromAttributesAsync(array $args = [])
 * @method \Aws\Result putSuppressedDestination(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putSuppressedDestinationAsync(array $args = [])
 * @method \Aws\Result sendBulkEmail(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise sendBulkEmailAsync(array $args = [])
 * @method \Aws\Result sendCustomVerificationEmail(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise sendCustomVerificationEmailAsync(array $args = [])
 * @method \Aws\Result sendEmail(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise sendEmailAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result testRenderEmailTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise testRenderEmailTemplateAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateConfigurationSetEventDestination(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateConfigurationSetEventDestinationAsync(array $args = [])
 * @method \Aws\Result updateContact(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateContactAsync(array $args = [])
 * @method \Aws\Result updateContactList(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateContactListAsync(array $args = [])
 * @method \Aws\Result updateCustomVerificationEmailTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateCustomVerificationEmailTemplateAsync(array $args = [])
 * @method \Aws\Result updateEmailIdentityPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateEmailIdentityPolicyAsync(array $args = [])
 * @method \Aws\Result updateEmailTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateEmailTemplateAsync(array $args = [])
 */
class SesV2Client extends AwsClient {}
