<?php
namespace Aws\Iot;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT** service.
 *
 * @method \Aws\Result acceptCertificateTransfer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise acceptCertificateTransferAsync(array $args = [])
 * @method \Aws\Result addThingToBillingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addThingToBillingGroupAsync(array $args = [])
 * @method \Aws\Result addThingToThingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addThingToThingGroupAsync(array $args = [])
 * @method \Aws\Result associateTargetsWithJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise associateTargetsWithJobAsync(array $args = [])
 * @method \Aws\Result attachPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise attachPolicyAsync(array $args = [])
 * @method \Aws\Result attachPrincipalPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise attachPrincipalPolicyAsync(array $args = [])
 * @method \Aws\Result attachSecurityProfile(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise attachSecurityProfileAsync(array $args = [])
 * @method \Aws\Result attachThingPrincipal(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise attachThingPrincipalAsync(array $args = [])
 * @method \Aws\Result cancelAuditMitigationActionsTask(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelAuditMitigationActionsTaskAsync(array $args = [])
 * @method \Aws\Result cancelAuditTask(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelAuditTaskAsync(array $args = [])
 * @method \Aws\Result cancelCertificateTransfer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelCertificateTransferAsync(array $args = [])
 * @method \Aws\Result cancelDetectMitigationActionsTask(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelDetectMitigationActionsTaskAsync(array $args = [])
 * @method \Aws\Result cancelJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @method \Aws\Result cancelJobExecution(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelJobExecutionAsync(array $args = [])
 * @method \Aws\Result clearDefaultAuthorizer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise clearDefaultAuthorizerAsync(array $args = [])
 * @method \Aws\Result confirmTopicRuleDestination(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise confirmTopicRuleDestinationAsync(array $args = [])
 * @method \Aws\Result createAuditSuppression(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createAuditSuppressionAsync(array $args = [])
 * @method \Aws\Result createAuthorizer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createAuthorizerAsync(array $args = [])
 * @method \Aws\Result createBillingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createBillingGroupAsync(array $args = [])
 * @method \Aws\Result createCertificateFromCsr(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createCertificateFromCsrAsync(array $args = [])
 * @method \Aws\Result createCustomMetric(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createCustomMetricAsync(array $args = [])
 * @method \Aws\Result createDimension(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDimensionAsync(array $args = [])
 * @method \Aws\Result createDomainConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDomainConfigurationAsync(array $args = [])
 * @method \Aws\Result createDynamicThingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDynamicThingGroupAsync(array $args = [])
 * @method \Aws\Result createFleetMetric(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createFleetMetricAsync(array $args = [])
 * @method \Aws\Result createJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createJobAsync(array $args = [])
 * @method \Aws\Result createJobTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createJobTemplateAsync(array $args = [])
 * @method \Aws\Result createKeysAndCertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createKeysAndCertificateAsync(array $args = [])
 * @method \Aws\Result createMitigationAction(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createMitigationActionAsync(array $args = [])
 * @method \Aws\Result createOTAUpdate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createOTAUpdateAsync(array $args = [])
 * @method \Aws\Result createPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createPolicyAsync(array $args = [])
 * @method \Aws\Result createPolicyVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createPolicyVersionAsync(array $args = [])
 * @method \Aws\Result createProvisioningClaim(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createProvisioningClaimAsync(array $args = [])
 * @method \Aws\Result createProvisioningTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createProvisioningTemplateAsync(array $args = [])
 * @method \Aws\Result createProvisioningTemplateVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createProvisioningTemplateVersionAsync(array $args = [])
 * @method \Aws\Result createRoleAlias(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createRoleAliasAsync(array $args = [])
 * @method \Aws\Result createScheduledAudit(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createScheduledAuditAsync(array $args = [])
 * @method \Aws\Result createSecurityProfile(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createSecurityProfileAsync(array $args = [])
 * @method \Aws\Result createStream(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createStreamAsync(array $args = [])
 * @method \Aws\Result createThing(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createThingAsync(array $args = [])
 * @method \Aws\Result createThingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createThingGroupAsync(array $args = [])
 * @method \Aws\Result createThingType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createThingTypeAsync(array $args = [])
 * @method \Aws\Result createTopicRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createTopicRuleAsync(array $args = [])
 * @method \Aws\Result createTopicRuleDestination(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createTopicRuleDestinationAsync(array $args = [])
 * @method \Aws\Result deleteAccountAuditConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteAccountAuditConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteAuditSuppression(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteAuditSuppressionAsync(array $args = [])
 * @method \Aws\Result deleteAuthorizer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteAuthorizerAsync(array $args = [])
 * @method \Aws\Result deleteBillingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteBillingGroupAsync(array $args = [])
 * @method \Aws\Result deleteCACertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteCACertificateAsync(array $args = [])
 * @method \Aws\Result deleteCertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteCertificateAsync(array $args = [])
 * @method \Aws\Result deleteCustomMetric(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteCustomMetricAsync(array $args = [])
 * @method \Aws\Result deleteDimension(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDimensionAsync(array $args = [])
 * @method \Aws\Result deleteDomainConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDomainConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteDynamicThingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDynamicThingGroupAsync(array $args = [])
 * @method \Aws\Result deleteFleetMetric(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteFleetMetricAsync(array $args = [])
 * @method \Aws\Result deleteJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteJobAsync(array $args = [])
 * @method \Aws\Result deleteJobExecution(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteJobExecutionAsync(array $args = [])
 * @method \Aws\Result deleteJobTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteJobTemplateAsync(array $args = [])
 * @method \Aws\Result deleteMitigationAction(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteMitigationActionAsync(array $args = [])
 * @method \Aws\Result deleteOTAUpdate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteOTAUpdateAsync(array $args = [])
 * @method \Aws\Result deletePolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @method \Aws\Result deletePolicyVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deletePolicyVersionAsync(array $args = [])
 * @method \Aws\Result deleteProvisioningTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteProvisioningTemplateAsync(array $args = [])
 * @method \Aws\Result deleteProvisioningTemplateVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteProvisioningTemplateVersionAsync(array $args = [])
 * @method \Aws\Result deleteRegistrationCode(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteRegistrationCodeAsync(array $args = [])
 * @method \Aws\Result deleteRoleAlias(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteRoleAliasAsync(array $args = [])
 * @method \Aws\Result deleteScheduledAudit(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteScheduledAuditAsync(array $args = [])
 * @method \Aws\Result deleteSecurityProfile(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteSecurityProfileAsync(array $args = [])
 * @method \Aws\Result deleteStream(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteStreamAsync(array $args = [])
 * @method \Aws\Result deleteThing(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteThingAsync(array $args = [])
 * @method \Aws\Result deleteThingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteThingGroupAsync(array $args = [])
 * @method \Aws\Result deleteThingType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteThingTypeAsync(array $args = [])
 * @method \Aws\Result deleteTopicRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteTopicRuleAsync(array $args = [])
 * @method \Aws\Result deleteTopicRuleDestination(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteTopicRuleDestinationAsync(array $args = [])
 * @method \Aws\Result deleteV2LoggingLevel(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteV2LoggingLevelAsync(array $args = [])
 * @method \Aws\Result deprecateThingType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deprecateThingTypeAsync(array $args = [])
 * @method \Aws\Result describeAccountAuditConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeAccountAuditConfigurationAsync(array $args = [])
 * @method \Aws\Result describeAuditFinding(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeAuditFindingAsync(array $args = [])
 * @method \Aws\Result describeAuditMitigationActionsTask(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeAuditMitigationActionsTaskAsync(array $args = [])
 * @method \Aws\Result describeAuditSuppression(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeAuditSuppressionAsync(array $args = [])
 * @method \Aws\Result describeAuditTask(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeAuditTaskAsync(array $args = [])
 * @method \Aws\Result describeAuthorizer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeAuthorizerAsync(array $args = [])
 * @method \Aws\Result describeBillingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeBillingGroupAsync(array $args = [])
 * @method \Aws\Result describeCACertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeCACertificateAsync(array $args = [])
 * @method \Aws\Result describeCertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeCertificateAsync(array $args = [])
 * @method \Aws\Result describeCustomMetric(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeCustomMetricAsync(array $args = [])
 * @method \Aws\Result describeDefaultAuthorizer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDefaultAuthorizerAsync(array $args = [])
 * @method \Aws\Result describeDetectMitigationActionsTask(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDetectMitigationActionsTaskAsync(array $args = [])
 * @method \Aws\Result describeDimension(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDimensionAsync(array $args = [])
 * @method \Aws\Result describeDomainConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDomainConfigurationAsync(array $args = [])
 * @method \Aws\Result describeEndpoint(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeEndpointAsync(array $args = [])
 * @method \Aws\Result describeEventConfigurations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeEventConfigurationsAsync(array $args = [])
 * @method \Aws\Result describeFleetMetric(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeFleetMetricAsync(array $args = [])
 * @method \Aws\Result describeIndex(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeIndexAsync(array $args = [])
 * @method \Aws\Result describeJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeJobAsync(array $args = [])
 * @method \Aws\Result describeJobExecution(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeJobExecutionAsync(array $args = [])
 * @method \Aws\Result describeJobTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeJobTemplateAsync(array $args = [])
 * @method \Aws\Result describeManagedJobTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeManagedJobTemplateAsync(array $args = [])
 * @method \Aws\Result describeMitigationAction(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeMitigationActionAsync(array $args = [])
 * @method \Aws\Result describeProvisioningTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeProvisioningTemplateAsync(array $args = [])
 * @method \Aws\Result describeProvisioningTemplateVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeProvisioningTemplateVersionAsync(array $args = [])
 * @method \Aws\Result describeRoleAlias(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeRoleAliasAsync(array $args = [])
 * @method \Aws\Result describeScheduledAudit(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeScheduledAuditAsync(array $args = [])
 * @method \Aws\Result describeSecurityProfile(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeSecurityProfileAsync(array $args = [])
 * @method \Aws\Result describeStream(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeStreamAsync(array $args = [])
 * @method \Aws\Result describeThing(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeThingAsync(array $args = [])
 * @method \Aws\Result describeThingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeThingGroupAsync(array $args = [])
 * @method \Aws\Result describeThingRegistrationTask(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeThingRegistrationTaskAsync(array $args = [])
 * @method \Aws\Result describeThingType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeThingTypeAsync(array $args = [])
 * @method \Aws\Result detachPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise detachPolicyAsync(array $args = [])
 * @method \Aws\Result detachPrincipalPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise detachPrincipalPolicyAsync(array $args = [])
 * @method \Aws\Result detachSecurityProfile(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise detachSecurityProfileAsync(array $args = [])
 * @method \Aws\Result detachThingPrincipal(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise detachThingPrincipalAsync(array $args = [])
 * @method \Aws\Result disableTopicRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disableTopicRuleAsync(array $args = [])
 * @method \Aws\Result enableTopicRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise enableTopicRuleAsync(array $args = [])
 * @method \Aws\Result getBehaviorModelTrainingSummaries(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getBehaviorModelTrainingSummariesAsync(array $args = [])
 * @method \Aws\Result getBucketsAggregation(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getBucketsAggregationAsync(array $args = [])
 * @method \Aws\Result getCardinality(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getCardinalityAsync(array $args = [])
 * @method \Aws\Result getEffectivePolicies(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getEffectivePoliciesAsync(array $args = [])
 * @method \Aws\Result getIndexingConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getIndexingConfigurationAsync(array $args = [])
 * @method \Aws\Result getJobDocument(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getJobDocumentAsync(array $args = [])
 * @method \Aws\Result getLoggingOptions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getLoggingOptionsAsync(array $args = [])
 * @method \Aws\Result getOTAUpdate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getOTAUpdateAsync(array $args = [])
 * @method \Aws\Result getPercentiles(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getPercentilesAsync(array $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @method \Aws\Result getPolicyVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getPolicyVersionAsync(array $args = [])
 * @method \Aws\Result getRegistrationCode(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getRegistrationCodeAsync(array $args = [])
 * @method \Aws\Result getStatistics(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getStatisticsAsync(array $args = [])
 * @method \Aws\Result getTopicRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getTopicRuleAsync(array $args = [])
 * @method \Aws\Result getTopicRuleDestination(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getTopicRuleDestinationAsync(array $args = [])
 * @method \Aws\Result getV2LoggingOptions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getV2LoggingOptionsAsync(array $args = [])
 * @method \Aws\Result listActiveViolations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listActiveViolationsAsync(array $args = [])
 * @method \Aws\Result listAttachedPolicies(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAttachedPoliciesAsync(array $args = [])
 * @method \Aws\Result listAuditFindings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAuditFindingsAsync(array $args = [])
 * @method \Aws\Result listAuditMitigationActionsExecutions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAuditMitigationActionsExecutionsAsync(array $args = [])
 * @method \Aws\Result listAuditMitigationActionsTasks(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAuditMitigationActionsTasksAsync(array $args = [])
 * @method \Aws\Result listAuditSuppressions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAuditSuppressionsAsync(array $args = [])
 * @method \Aws\Result listAuditTasks(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAuditTasksAsync(array $args = [])
 * @method \Aws\Result listAuthorizers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAuthorizersAsync(array $args = [])
 * @method \Aws\Result listBillingGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listBillingGroupsAsync(array $args = [])
 * @method \Aws\Result listCACertificates(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listCACertificatesAsync(array $args = [])
 * @method \Aws\Result listCertificates(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listCertificatesAsync(array $args = [])
 * @method \Aws\Result listCertificatesByCA(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listCertificatesByCAAsync(array $args = [])
 * @method \Aws\Result listCustomMetrics(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listCustomMetricsAsync(array $args = [])
 * @method \Aws\Result listDetectMitigationActionsExecutions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDetectMitigationActionsExecutionsAsync(array $args = [])
 * @method \Aws\Result listDetectMitigationActionsTasks(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDetectMitigationActionsTasksAsync(array $args = [])
 * @method \Aws\Result listDimensions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDimensionsAsync(array $args = [])
 * @method \Aws\Result listDomainConfigurations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDomainConfigurationsAsync(array $args = [])
 * @method \Aws\Result listFleetMetrics(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listFleetMetricsAsync(array $args = [])
 * @method \Aws\Result listIndices(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listIndicesAsync(array $args = [])
 * @method \Aws\Result listJobExecutionsForJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listJobExecutionsForJobAsync(array $args = [])
 * @method \Aws\Result listJobExecutionsForThing(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listJobExecutionsForThingAsync(array $args = [])
 * @method \Aws\Result listJobTemplates(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listJobTemplatesAsync(array $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listJobsAsync(array $args = [])
 * @method \Aws\Result listManagedJobTemplates(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listManagedJobTemplatesAsync(array $args = [])
 * @method \Aws\Result listMetricValues(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listMetricValuesAsync(array $args = [])
 * @method \Aws\Result listMitigationActions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listMitigationActionsAsync(array $args = [])
 * @method \Aws\Result listOTAUpdates(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listOTAUpdatesAsync(array $args = [])
 * @method \Aws\Result listOutgoingCertificates(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listOutgoingCertificatesAsync(array $args = [])
 * @method \Aws\Result listPolicies(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listPoliciesAsync(array $args = [])
 * @method \Aws\Result listPolicyPrincipals(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listPolicyPrincipalsAsync(array $args = [])
 * @method \Aws\Result listPolicyVersions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listPolicyVersionsAsync(array $args = [])
 * @method \Aws\Result listPrincipalPolicies(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listPrincipalPoliciesAsync(array $args = [])
 * @method \Aws\Result listPrincipalThings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listPrincipalThingsAsync(array $args = [])
 * @method \Aws\Result listProvisioningTemplateVersions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listProvisioningTemplateVersionsAsync(array $args = [])
 * @method \Aws\Result listProvisioningTemplates(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listProvisioningTemplatesAsync(array $args = [])
 * @method \Aws\Result listRoleAliases(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listRoleAliasesAsync(array $args = [])
 * @method \Aws\Result listScheduledAudits(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listScheduledAuditsAsync(array $args = [])
 * @method \Aws\Result listSecurityProfiles(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listSecurityProfilesAsync(array $args = [])
 * @method \Aws\Result listSecurityProfilesForTarget(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listSecurityProfilesForTargetAsync(array $args = [])
 * @method \Aws\Result listStreams(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listStreamsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result listTargetsForPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTargetsForPolicyAsync(array $args = [])
 * @method \Aws\Result listTargetsForSecurityProfile(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTargetsForSecurityProfileAsync(array $args = [])
 * @method \Aws\Result listThingGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listThingGroupsAsync(array $args = [])
 * @method \Aws\Result listThingGroupsForThing(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listThingGroupsForThingAsync(array $args = [])
 * @method \Aws\Result listThingPrincipals(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listThingPrincipalsAsync(array $args = [])
 * @method \Aws\Result listThingRegistrationTaskReports(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listThingRegistrationTaskReportsAsync(array $args = [])
 * @method \Aws\Result listThingRegistrationTasks(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listThingRegistrationTasksAsync(array $args = [])
 * @method \Aws\Result listThingTypes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listThingTypesAsync(array $args = [])
 * @method \Aws\Result listThings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listThingsAsync(array $args = [])
 * @method \Aws\Result listThingsInBillingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listThingsInBillingGroupAsync(array $args = [])
 * @method \Aws\Result listThingsInThingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listThingsInThingGroupAsync(array $args = [])
 * @method \Aws\Result listTopicRuleDestinations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTopicRuleDestinationsAsync(array $args = [])
 * @method \Aws\Result listTopicRules(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTopicRulesAsync(array $args = [])
 * @method \Aws\Result listV2LoggingLevels(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listV2LoggingLevelsAsync(array $args = [])
 * @method \Aws\Result listViolationEvents(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listViolationEventsAsync(array $args = [])
 * @method \Aws\Result putVerificationStateOnViolation(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putVerificationStateOnViolationAsync(array $args = [])
 * @method \Aws\Result registerCACertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise registerCACertificateAsync(array $args = [])
 * @method \Aws\Result registerCertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise registerCertificateAsync(array $args = [])
 * @method \Aws\Result registerCertificateWithoutCA(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise registerCertificateWithoutCAAsync(array $args = [])
 * @method \Aws\Result registerThing(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise registerThingAsync(array $args = [])
 * @method \Aws\Result rejectCertificateTransfer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise rejectCertificateTransferAsync(array $args = [])
 * @method \Aws\Result removeThingFromBillingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise removeThingFromBillingGroupAsync(array $args = [])
 * @method \Aws\Result removeThingFromThingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise removeThingFromThingGroupAsync(array $args = [])
 * @method \Aws\Result replaceTopicRule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise replaceTopicRuleAsync(array $args = [])
 * @method \Aws\Result searchIndex(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise searchIndexAsync(array $args = [])
 * @method \Aws\Result setDefaultAuthorizer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise setDefaultAuthorizerAsync(array $args = [])
 * @method \Aws\Result setDefaultPolicyVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise setDefaultPolicyVersionAsync(array $args = [])
 * @method \Aws\Result setLoggingOptions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise setLoggingOptionsAsync(array $args = [])
 * @method \Aws\Result setV2LoggingLevel(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise setV2LoggingLevelAsync(array $args = [])
 * @method \Aws\Result setV2LoggingOptions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise setV2LoggingOptionsAsync(array $args = [])
 * @method \Aws\Result startAuditMitigationActionsTask(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startAuditMitigationActionsTaskAsync(array $args = [])
 * @method \Aws\Result startDetectMitigationActionsTask(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startDetectMitigationActionsTaskAsync(array $args = [])
 * @method \Aws\Result startOnDemandAuditTask(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startOnDemandAuditTaskAsync(array $args = [])
 * @method \Aws\Result startThingRegistrationTask(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startThingRegistrationTaskAsync(array $args = [])
 * @method \Aws\Result stopThingRegistrationTask(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise stopThingRegistrationTaskAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result testAuthorization(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise testAuthorizationAsync(array $args = [])
 * @method \Aws\Result testInvokeAuthorizer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise testInvokeAuthorizerAsync(array $args = [])
 * @method \Aws\Result transferCertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise transferCertificateAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateAccountAuditConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateAccountAuditConfigurationAsync(array $args = [])
 * @method \Aws\Result updateAuditSuppression(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateAuditSuppressionAsync(array $args = [])
 * @method \Aws\Result updateAuthorizer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateAuthorizerAsync(array $args = [])
 * @method \Aws\Result updateBillingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateBillingGroupAsync(array $args = [])
 * @method \Aws\Result updateCACertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateCACertificateAsync(array $args = [])
 * @method \Aws\Result updateCertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateCertificateAsync(array $args = [])
 * @method \Aws\Result updateCustomMetric(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateCustomMetricAsync(array $args = [])
 * @method \Aws\Result updateDimension(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateDimensionAsync(array $args = [])
 * @method \Aws\Result updateDomainConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateDomainConfigurationAsync(array $args = [])
 * @method \Aws\Result updateDynamicThingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateDynamicThingGroupAsync(array $args = [])
 * @method \Aws\Result updateEventConfigurations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateEventConfigurationsAsync(array $args = [])
 * @method \Aws\Result updateFleetMetric(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateFleetMetricAsync(array $args = [])
 * @method \Aws\Result updateIndexingConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateIndexingConfigurationAsync(array $args = [])
 * @method \Aws\Result updateJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateJobAsync(array $args = [])
 * @method \Aws\Result updateMitigationAction(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateMitigationActionAsync(array $args = [])
 * @method \Aws\Result updateProvisioningTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateProvisioningTemplateAsync(array $args = [])
 * @method \Aws\Result updateRoleAlias(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateRoleAliasAsync(array $args = [])
 * @method \Aws\Result updateScheduledAudit(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateScheduledAuditAsync(array $args = [])
 * @method \Aws\Result updateSecurityProfile(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateSecurityProfileAsync(array $args = [])
 * @method \Aws\Result updateStream(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateStreamAsync(array $args = [])
 * @method \Aws\Result updateThing(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateThingAsync(array $args = [])
 * @method \Aws\Result updateThingGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateThingGroupAsync(array $args = [])
 * @method \Aws\Result updateThingGroupsForThing(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateThingGroupsForThingAsync(array $args = [])
 * @method \Aws\Result updateTopicRuleDestination(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateTopicRuleDestinationAsync(array $args = [])
 * @method \Aws\Result validateSecurityProfileBehaviors(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise validateSecurityProfileBehaviorsAsync(array $args = [])
 */
class IotClient extends AwsClient {}
