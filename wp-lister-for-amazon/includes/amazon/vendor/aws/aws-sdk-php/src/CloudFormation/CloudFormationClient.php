<?php
namespace Aws\CloudFormation;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CloudFormation** service.
 *
 * @method \Aws\Result activateType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise activateTypeAsync(array $args = [])
 * @method \Aws\Result batchDescribeTypeConfigurations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchDescribeTypeConfigurationsAsync(array $args = [])
 * @method \Aws\Result cancelUpdateStack(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelUpdateStackAsync(array $args = [])
 * @method \Aws\Result continueUpdateRollback(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise continueUpdateRollbackAsync(array $args = [])
 * @method \Aws\Result createChangeSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createChangeSetAsync(array $args = [])
 * @method \Aws\Result createStack(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createStackAsync(array $args = [])
 * @method \Aws\Result createStackInstances(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createStackInstancesAsync(array $args = [])
 * @method \Aws\Result createStackSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createStackSetAsync(array $args = [])
 * @method \Aws\Result deactivateType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deactivateTypeAsync(array $args = [])
 * @method \Aws\Result deleteChangeSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteChangeSetAsync(array $args = [])
 * @method \Aws\Result deleteStack(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteStackAsync(array $args = [])
 * @method \Aws\Result deleteStackInstances(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteStackInstancesAsync(array $args = [])
 * @method \Aws\Result deleteStackSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteStackSetAsync(array $args = [])
 * @method \Aws\Result deregisterType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deregisterTypeAsync(array $args = [])
 * @method \Aws\Result describeAccountLimits(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeAccountLimitsAsync(array $args = [])
 * @method \Aws\Result describeChangeSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeChangeSetAsync(array $args = [])
 * @method \Aws\Result describeChangeSetHooks(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeChangeSetHooksAsync(array $args = [])
 * @method \Aws\Result describePublisher(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describePublisherAsync(array $args = [])
 * @method \Aws\Result describeStackDriftDetectionStatus(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeStackDriftDetectionStatusAsync(array $args = [])
 * @method \Aws\Result describeStackEvents(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeStackEventsAsync(array $args = [])
 * @method \Aws\Result describeStackInstance(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeStackInstanceAsync(array $args = [])
 * @method \Aws\Result describeStackResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeStackResourceAsync(array $args = [])
 * @method \Aws\Result describeStackResourceDrifts(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeStackResourceDriftsAsync(array $args = [])
 * @method \Aws\Result describeStackResources(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeStackResourcesAsync(array $args = [])
 * @method \Aws\Result describeStackSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeStackSetAsync(array $args = [])
 * @method \Aws\Result describeStackSetOperation(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeStackSetOperationAsync(array $args = [])
 * @method \Aws\Result describeStacks(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeStacksAsync(array $args = [])
 * @method \Aws\Result describeType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeTypeAsync(array $args = [])
 * @method \Aws\Result describeTypeRegistration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeTypeRegistrationAsync(array $args = [])
 * @method \Aws\Result detectStackDrift(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise detectStackDriftAsync(array $args = [])
 * @method \Aws\Result detectStackResourceDrift(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise detectStackResourceDriftAsync(array $args = [])
 * @method \Aws\Result detectStackSetDrift(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise detectStackSetDriftAsync(array $args = [])
 * @method \Aws\Result estimateTemplateCost(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise estimateTemplateCostAsync(array $args = [])
 * @method \Aws\Result executeChangeSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise executeChangeSetAsync(array $args = [])
 * @method \Aws\Result getStackPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getStackPolicyAsync(array $args = [])
 * @method \Aws\Result getTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getTemplateAsync(array $args = [])
 * @method \Aws\Result getTemplateSummary(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getTemplateSummaryAsync(array $args = [])
 * @method \Aws\Result importStacksToStackSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise importStacksToStackSetAsync(array $args = [])
 * @method \Aws\Result listChangeSets(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listChangeSetsAsync(array $args = [])
 * @method \Aws\Result listExports(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listExportsAsync(array $args = [])
 * @method \Aws\Result listImports(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listImportsAsync(array $args = [])
 * @method \Aws\Result listStackInstances(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listStackInstancesAsync(array $args = [])
 * @method \Aws\Result listStackResources(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listStackResourcesAsync(array $args = [])
 * @method \Aws\Result listStackSetOperationResults(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listStackSetOperationResultsAsync(array $args = [])
 * @method \Aws\Result listStackSetOperations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listStackSetOperationsAsync(array $args = [])
 * @method \Aws\Result listStackSets(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listStackSetsAsync(array $args = [])
 * @method \Aws\Result listStacks(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listStacksAsync(array $args = [])
 * @method \Aws\Result listTypeRegistrations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTypeRegistrationsAsync(array $args = [])
 * @method \Aws\Result listTypeVersions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTypeVersionsAsync(array $args = [])
 * @method \Aws\Result listTypes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTypesAsync(array $args = [])
 * @method \Aws\Result publishType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise publishTypeAsync(array $args = [])
 * @method \Aws\Result recordHandlerProgress(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise recordHandlerProgressAsync(array $args = [])
 * @method \Aws\Result registerPublisher(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise registerPublisherAsync(array $args = [])
 * @method \Aws\Result registerType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise registerTypeAsync(array $args = [])
 * @method \Aws\Result rollbackStack(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise rollbackStackAsync(array $args = [])
 * @method \Aws\Result setStackPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise setStackPolicyAsync(array $args = [])
 * @method \Aws\Result setTypeConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise setTypeConfigurationAsync(array $args = [])
 * @method \Aws\Result setTypeDefaultVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise setTypeDefaultVersionAsync(array $args = [])
 * @method \Aws\Result signalResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise signalResourceAsync(array $args = [])
 * @method \Aws\Result stopStackSetOperation(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise stopStackSetOperationAsync(array $args = [])
 * @method \Aws\Result testType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise testTypeAsync(array $args = [])
 * @method \Aws\Result updateStack(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateStackAsync(array $args = [])
 * @method \Aws\Result updateStackInstances(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateStackInstancesAsync(array $args = [])
 * @method \Aws\Result updateStackSet(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateStackSetAsync(array $args = [])
 * @method \Aws\Result updateTerminationProtection(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateTerminationProtectionAsync(array $args = [])
 * @method \Aws\Result validateTemplate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise validateTemplateAsync(array $args = [])
 */
class CloudFormationClient extends AwsClient {}
