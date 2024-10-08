<?php
namespace Aws\SecurityHub;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS SecurityHub** service.
 * @method \Aws\Result acceptAdministratorInvitation(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise acceptAdministratorInvitationAsync(array $args = [])
 * @method \Aws\Result acceptInvitation(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise acceptInvitationAsync(array $args = [])
 * @method \Aws\Result batchDisableStandards(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchDisableStandardsAsync(array $args = [])
 * @method \Aws\Result batchEnableStandards(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchEnableStandardsAsync(array $args = [])
 * @method \Aws\Result batchImportFindings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchImportFindingsAsync(array $args = [])
 * @method \Aws\Result batchUpdateFindings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchUpdateFindingsAsync(array $args = [])
 * @method \Aws\Result createActionTarget(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createActionTargetAsync(array $args = [])
 * @method \Aws\Result createFindingAggregator(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createFindingAggregatorAsync(array $args = [])
 * @method \Aws\Result createInsight(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createInsightAsync(array $args = [])
 * @method \Aws\Result createMembers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createMembersAsync(array $args = [])
 * @method \Aws\Result declineInvitations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise declineInvitationsAsync(array $args = [])
 * @method \Aws\Result deleteActionTarget(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteActionTargetAsync(array $args = [])
 * @method \Aws\Result deleteFindingAggregator(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteFindingAggregatorAsync(array $args = [])
 * @method \Aws\Result deleteInsight(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteInsightAsync(array $args = [])
 * @method \Aws\Result deleteInvitations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteInvitationsAsync(array $args = [])
 * @method \Aws\Result deleteMembers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteMembersAsync(array $args = [])
 * @method \Aws\Result describeActionTargets(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeActionTargetsAsync(array $args = [])
 * @method \Aws\Result describeHub(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeHubAsync(array $args = [])
 * @method \Aws\Result describeOrganizationConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeOrganizationConfigurationAsync(array $args = [])
 * @method \Aws\Result describeProducts(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeProductsAsync(array $args = [])
 * @method \Aws\Result describeStandards(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeStandardsAsync(array $args = [])
 * @method \Aws\Result describeStandardsControls(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeStandardsControlsAsync(array $args = [])
 * @method \Aws\Result disableImportFindingsForProduct(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disableImportFindingsForProductAsync(array $args = [])
 * @method \Aws\Result disableOrganizationAdminAccount(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disableOrganizationAdminAccountAsync(array $args = [])
 * @method \Aws\Result disableSecurityHub(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disableSecurityHubAsync(array $args = [])
 * @method \Aws\Result disassociateFromAdministratorAccount(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disassociateFromAdministratorAccountAsync(array $args = [])
 * @method \Aws\Result disassociateFromMasterAccount(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disassociateFromMasterAccountAsync(array $args = [])
 * @method \Aws\Result disassociateMembers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disassociateMembersAsync(array $args = [])
 * @method \Aws\Result enableImportFindingsForProduct(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise enableImportFindingsForProductAsync(array $args = [])
 * @method \Aws\Result enableOrganizationAdminAccount(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise enableOrganizationAdminAccountAsync(array $args = [])
 * @method \Aws\Result enableSecurityHub(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise enableSecurityHubAsync(array $args = [])
 * @method \Aws\Result getAdministratorAccount(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getAdministratorAccountAsync(array $args = [])
 * @method \Aws\Result getEnabledStandards(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getEnabledStandardsAsync(array $args = [])
 * @method \Aws\Result getFindingAggregator(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getFindingAggregatorAsync(array $args = [])
 * @method \Aws\Result getFindings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getFindingsAsync(array $args = [])
 * @method \Aws\Result getInsightResults(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getInsightResultsAsync(array $args = [])
 * @method \Aws\Result getInsights(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getInsightsAsync(array $args = [])
 * @method \Aws\Result getInvitationsCount(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getInvitationsCountAsync(array $args = [])
 * @method \Aws\Result getMasterAccount(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMasterAccountAsync(array $args = [])
 * @method \Aws\Result getMembers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMembersAsync(array $args = [])
 * @method \Aws\Result inviteMembers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise inviteMembersAsync(array $args = [])
 * @method \Aws\Result listEnabledProductsForImport(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listEnabledProductsForImportAsync(array $args = [])
 * @method \Aws\Result listFindingAggregators(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listFindingAggregatorsAsync(array $args = [])
 * @method \Aws\Result listInvitations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listInvitationsAsync(array $args = [])
 * @method \Aws\Result listMembers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listMembersAsync(array $args = [])
 * @method \Aws\Result listOrganizationAdminAccounts(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listOrganizationAdminAccountsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateActionTarget(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateActionTargetAsync(array $args = [])
 * @method \Aws\Result updateFindingAggregator(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateFindingAggregatorAsync(array $args = [])
 * @method \Aws\Result updateFindings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateFindingsAsync(array $args = [])
 * @method \Aws\Result updateInsight(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateInsightAsync(array $args = [])
 * @method \Aws\Result updateOrganizationConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateOrganizationConfigurationAsync(array $args = [])
 * @method \Aws\Result updateSecurityHubConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateSecurityHubConfigurationAsync(array $args = [])
 * @method \Aws\Result updateStandardsControl(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateStandardsControlAsync(array $args = [])
 */
class SecurityHubClient extends AwsClient {}
