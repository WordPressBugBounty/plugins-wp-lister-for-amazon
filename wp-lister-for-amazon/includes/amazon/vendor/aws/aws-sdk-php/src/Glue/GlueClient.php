<?php
namespace Aws\Glue;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Glue** service.
 * @method \Aws\Result batchCreatePartition(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchCreatePartitionAsync(array $args = [])
 * @method \Aws\Result batchDeleteConnection(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchDeleteConnectionAsync(array $args = [])
 * @method \Aws\Result batchDeletePartition(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchDeletePartitionAsync(array $args = [])
 * @method \Aws\Result batchDeleteTable(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchDeleteTableAsync(array $args = [])
 * @method \Aws\Result batchDeleteTableVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchDeleteTableVersionAsync(array $args = [])
 * @method \Aws\Result batchGetBlueprints(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchGetBlueprintsAsync(array $args = [])
 * @method \Aws\Result batchGetCrawlers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchGetCrawlersAsync(array $args = [])
 * @method \Aws\Result batchGetCustomEntityTypes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchGetCustomEntityTypesAsync(array $args = [])
 * @method \Aws\Result batchGetDevEndpoints(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchGetDevEndpointsAsync(array $args = [])
 * @method \Aws\Result batchGetJobs(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchGetJobsAsync(array $args = [])
 * @method \Aws\Result batchGetPartition(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchGetPartitionAsync(array $args = [])
 * @method \Aws\Result batchGetTriggers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchGetTriggersAsync(array $args = [])
 * @method \Aws\Result batchGetWorkflows(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchGetWorkflowsAsync(array $args = [])
 * @method \Aws\Result batchStopJobRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchStopJobRunAsync(array $args = [])
 * @method \Aws\Result batchUpdatePartition(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise batchUpdatePartitionAsync(array $args = [])
 * @method \Aws\Result cancelMLTaskRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelMLTaskRunAsync(array $args = [])
 * @method \Aws\Result cancelStatement(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelStatementAsync(array $args = [])
 * @method \Aws\Result checkSchemaVersionValidity(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise checkSchemaVersionValidityAsync(array $args = [])
 * @method \Aws\Result createBlueprint(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createBlueprintAsync(array $args = [])
 * @method \Aws\Result createClassifier(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createClassifierAsync(array $args = [])
 * @method \Aws\Result createConnection(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @method \Aws\Result createCrawler(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createCrawlerAsync(array $args = [])
 * @method \Aws\Result createCustomEntityType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createCustomEntityTypeAsync(array $args = [])
 * @method \Aws\Result createDatabase(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDatabaseAsync(array $args = [])
 * @method \Aws\Result createDevEndpoint(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDevEndpointAsync(array $args = [])
 * @method \Aws\Result createJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createJobAsync(array $args = [])
 * @method \Aws\Result createMLTransform(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createMLTransformAsync(array $args = [])
 * @method \Aws\Result createPartition(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createPartitionAsync(array $args = [])
 * @method \Aws\Result createPartitionIndex(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createPartitionIndexAsync(array $args = [])
 * @method \Aws\Result createRegistry(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createRegistryAsync(array $args = [])
 * @method \Aws\Result createSchema(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createSchemaAsync(array $args = [])
 * @method \Aws\Result createScript(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createScriptAsync(array $args = [])
 * @method \Aws\Result createSecurityConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createSecurityConfigurationAsync(array $args = [])
 * @method \Aws\Result createSession(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createSessionAsync(array $args = [])
 * @method \Aws\Result createTable(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createTableAsync(array $args = [])
 * @method \Aws\Result createTrigger(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createTriggerAsync(array $args = [])
 * @method \Aws\Result createUserDefinedFunction(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createUserDefinedFunctionAsync(array $args = [])
 * @method \Aws\Result createWorkflow(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createWorkflowAsync(array $args = [])
 * @method \Aws\Result deleteBlueprint(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteBlueprintAsync(array $args = [])
 * @method \Aws\Result deleteClassifier(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteClassifierAsync(array $args = [])
 * @method \Aws\Result deleteColumnStatisticsForPartition(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteColumnStatisticsForPartitionAsync(array $args = [])
 * @method \Aws\Result deleteColumnStatisticsForTable(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteColumnStatisticsForTableAsync(array $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @method \Aws\Result deleteCrawler(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteCrawlerAsync(array $args = [])
 * @method \Aws\Result deleteCustomEntityType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteCustomEntityTypeAsync(array $args = [])
 * @method \Aws\Result deleteDatabase(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDatabaseAsync(array $args = [])
 * @method \Aws\Result deleteDevEndpoint(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDevEndpointAsync(array $args = [])
 * @method \Aws\Result deleteJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteJobAsync(array $args = [])
 * @method \Aws\Result deleteMLTransform(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteMLTransformAsync(array $args = [])
 * @method \Aws\Result deletePartition(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deletePartitionAsync(array $args = [])
 * @method \Aws\Result deletePartitionIndex(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deletePartitionIndexAsync(array $args = [])
 * @method \Aws\Result deleteRegistry(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteRegistryAsync(array $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @method \Aws\Result deleteSchema(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteSchemaAsync(array $args = [])
 * @method \Aws\Result deleteSchemaVersions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteSchemaVersionsAsync(array $args = [])
 * @method \Aws\Result deleteSecurityConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteSecurityConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteSession(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteSessionAsync(array $args = [])
 * @method \Aws\Result deleteTable(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteTableAsync(array $args = [])
 * @method \Aws\Result deleteTableVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteTableVersionAsync(array $args = [])
 * @method \Aws\Result deleteTrigger(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteTriggerAsync(array $args = [])
 * @method \Aws\Result deleteUserDefinedFunction(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteUserDefinedFunctionAsync(array $args = [])
 * @method \Aws\Result deleteWorkflow(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteWorkflowAsync(array $args = [])
 * @method \Aws\Result getBlueprint(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getBlueprintAsync(array $args = [])
 * @method \Aws\Result getBlueprintRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getBlueprintRunAsync(array $args = [])
 * @method \Aws\Result getBlueprintRuns(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getBlueprintRunsAsync(array $args = [])
 * @method \Aws\Result getCatalogImportStatus(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getCatalogImportStatusAsync(array $args = [])
 * @method \Aws\Result getClassifier(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getClassifierAsync(array $args = [])
 * @method \Aws\Result getClassifiers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getClassifiersAsync(array $args = [])
 * @method \Aws\Result getColumnStatisticsForPartition(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getColumnStatisticsForPartitionAsync(array $args = [])
 * @method \Aws\Result getColumnStatisticsForTable(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getColumnStatisticsForTableAsync(array $args = [])
 * @method \Aws\Result getConnection(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getConnectionAsync(array $args = [])
 * @method \Aws\Result getConnections(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getConnectionsAsync(array $args = [])
 * @method \Aws\Result getCrawler(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getCrawlerAsync(array $args = [])
 * @method \Aws\Result getCrawlerMetrics(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getCrawlerMetricsAsync(array $args = [])
 * @method \Aws\Result getCrawlers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getCrawlersAsync(array $args = [])
 * @method \Aws\Result getCustomEntityType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getCustomEntityTypeAsync(array $args = [])
 * @method \Aws\Result getDataCatalogEncryptionSettings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDataCatalogEncryptionSettingsAsync(array $args = [])
 * @method \Aws\Result getDatabase(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDatabaseAsync(array $args = [])
 * @method \Aws\Result getDatabases(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDatabasesAsync(array $args = [])
 * @method \Aws\Result getDataflowGraph(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDataflowGraphAsync(array $args = [])
 * @method \Aws\Result getDevEndpoint(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDevEndpointAsync(array $args = [])
 * @method \Aws\Result getDevEndpoints(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDevEndpointsAsync(array $args = [])
 * @method \Aws\Result getJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getJobAsync(array $args = [])
 * @method \Aws\Result getJobBookmark(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getJobBookmarkAsync(array $args = [])
 * @method \Aws\Result getJobRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getJobRunAsync(array $args = [])
 * @method \Aws\Result getJobRuns(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getJobRunsAsync(array $args = [])
 * @method \Aws\Result getJobs(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getJobsAsync(array $args = [])
 * @method \Aws\Result getMLTaskRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMLTaskRunAsync(array $args = [])
 * @method \Aws\Result getMLTaskRuns(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMLTaskRunsAsync(array $args = [])
 * @method \Aws\Result getMLTransform(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMLTransformAsync(array $args = [])
 * @method \Aws\Result getMLTransforms(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMLTransformsAsync(array $args = [])
 * @method \Aws\Result getMapping(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMappingAsync(array $args = [])
 * @method \Aws\Result getPartition(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getPartitionAsync(array $args = [])
 * @method \Aws\Result getPartitionIndexes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getPartitionIndexesAsync(array $args = [])
 * @method \Aws\Result getPartitions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getPartitionsAsync(array $args = [])
 * @method \Aws\Result getPlan(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getPlanAsync(array $args = [])
 * @method \Aws\Result getRegistry(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getRegistryAsync(array $args = [])
 * @method \Aws\Result getResourcePolicies(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getResourcePoliciesAsync(array $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @method \Aws\Result getSchema(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getSchemaAsync(array $args = [])
 * @method \Aws\Result getSchemaByDefinition(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getSchemaByDefinitionAsync(array $args = [])
 * @method \Aws\Result getSchemaVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getSchemaVersionAsync(array $args = [])
 * @method \Aws\Result getSchemaVersionsDiff(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getSchemaVersionsDiffAsync(array $args = [])
 * @method \Aws\Result getSecurityConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getSecurityConfigurationAsync(array $args = [])
 * @method \Aws\Result getSecurityConfigurations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getSecurityConfigurationsAsync(array $args = [])
 * @method \Aws\Result getSession(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getSessionAsync(array $args = [])
 * @method \Aws\Result getStatement(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getStatementAsync(array $args = [])
 * @method \Aws\Result getTable(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getTableAsync(array $args = [])
 * @method \Aws\Result getTableVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getTableVersionAsync(array $args = [])
 * @method \Aws\Result getTableVersions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getTableVersionsAsync(array $args = [])
 * @method \Aws\Result getTables(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getTablesAsync(array $args = [])
 * @method \Aws\Result getTags(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getTagsAsync(array $args = [])
 * @method \Aws\Result getTrigger(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getTriggerAsync(array $args = [])
 * @method \Aws\Result getTriggers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getTriggersAsync(array $args = [])
 * @method \Aws\Result getUnfilteredPartitionMetadata(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getUnfilteredPartitionMetadataAsync(array $args = [])
 * @method \Aws\Result getUnfilteredPartitionsMetadata(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getUnfilteredPartitionsMetadataAsync(array $args = [])
 * @method \Aws\Result getUnfilteredTableMetadata(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getUnfilteredTableMetadataAsync(array $args = [])
 * @method \Aws\Result getUserDefinedFunction(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getUserDefinedFunctionAsync(array $args = [])
 * @method \Aws\Result getUserDefinedFunctions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getUserDefinedFunctionsAsync(array $args = [])
 * @method \Aws\Result getWorkflow(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getWorkflowAsync(array $args = [])
 * @method \Aws\Result getWorkflowRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getWorkflowRunAsync(array $args = [])
 * @method \Aws\Result getWorkflowRunProperties(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getWorkflowRunPropertiesAsync(array $args = [])
 * @method \Aws\Result getWorkflowRuns(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getWorkflowRunsAsync(array $args = [])
 * @method \Aws\Result importCatalogToGlue(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise importCatalogToGlueAsync(array $args = [])
 * @method \Aws\Result listBlueprints(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listBlueprintsAsync(array $args = [])
 * @method \Aws\Result listCrawlers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listCrawlersAsync(array $args = [])
 * @method \Aws\Result listCrawls(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listCrawlsAsync(array $args = [])
 * @method \Aws\Result listCustomEntityTypes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listCustomEntityTypesAsync(array $args = [])
 * @method \Aws\Result listDevEndpoints(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDevEndpointsAsync(array $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listJobsAsync(array $args = [])
 * @method \Aws\Result listMLTransforms(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listMLTransformsAsync(array $args = [])
 * @method \Aws\Result listRegistries(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listRegistriesAsync(array $args = [])
 * @method \Aws\Result listSchemaVersions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listSchemaVersionsAsync(array $args = [])
 * @method \Aws\Result listSchemas(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listSchemasAsync(array $args = [])
 * @method \Aws\Result listSessions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @method \Aws\Result listStatements(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listStatementsAsync(array $args = [])
 * @method \Aws\Result listTriggers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTriggersAsync(array $args = [])
 * @method \Aws\Result listWorkflows(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listWorkflowsAsync(array $args = [])
 * @method \Aws\Result putDataCatalogEncryptionSettings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putDataCatalogEncryptionSettingsAsync(array $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @method \Aws\Result putSchemaVersionMetadata(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putSchemaVersionMetadataAsync(array $args = [])
 * @method \Aws\Result putWorkflowRunProperties(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putWorkflowRunPropertiesAsync(array $args = [])
 * @method \Aws\Result querySchemaVersionMetadata(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise querySchemaVersionMetadataAsync(array $args = [])
 * @method \Aws\Result registerSchemaVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise registerSchemaVersionAsync(array $args = [])
 * @method \Aws\Result removeSchemaVersionMetadata(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise removeSchemaVersionMetadataAsync(array $args = [])
 * @method \Aws\Result resetJobBookmark(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise resetJobBookmarkAsync(array $args = [])
 * @method \Aws\Result resumeWorkflowRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise resumeWorkflowRunAsync(array $args = [])
 * @method \Aws\Result runStatement(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise runStatementAsync(array $args = [])
 * @method \Aws\Result searchTables(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise searchTablesAsync(array $args = [])
 * @method \Aws\Result startBlueprintRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startBlueprintRunAsync(array $args = [])
 * @method \Aws\Result startCrawler(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startCrawlerAsync(array $args = [])
 * @method \Aws\Result startCrawlerSchedule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startCrawlerScheduleAsync(array $args = [])
 * @method \Aws\Result startExportLabelsTaskRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startExportLabelsTaskRunAsync(array $args = [])
 * @method \Aws\Result startImportLabelsTaskRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startImportLabelsTaskRunAsync(array $args = [])
 * @method \Aws\Result startJobRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startJobRunAsync(array $args = [])
 * @method \Aws\Result startMLEvaluationTaskRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startMLEvaluationTaskRunAsync(array $args = [])
 * @method \Aws\Result startMLLabelingSetGenerationTaskRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startMLLabelingSetGenerationTaskRunAsync(array $args = [])
 * @method \Aws\Result startTrigger(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startTriggerAsync(array $args = [])
 * @method \Aws\Result startWorkflowRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startWorkflowRunAsync(array $args = [])
 * @method \Aws\Result stopCrawler(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise stopCrawlerAsync(array $args = [])
 * @method \Aws\Result stopCrawlerSchedule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise stopCrawlerScheduleAsync(array $args = [])
 * @method \Aws\Result stopSession(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise stopSessionAsync(array $args = [])
 * @method \Aws\Result stopTrigger(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise stopTriggerAsync(array $args = [])
 * @method \Aws\Result stopWorkflowRun(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise stopWorkflowRunAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateBlueprint(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateBlueprintAsync(array $args = [])
 * @method \Aws\Result updateClassifier(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateClassifierAsync(array $args = [])
 * @method \Aws\Result updateColumnStatisticsForPartition(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateColumnStatisticsForPartitionAsync(array $args = [])
 * @method \Aws\Result updateColumnStatisticsForTable(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateColumnStatisticsForTableAsync(array $args = [])
 * @method \Aws\Result updateConnection(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateConnectionAsync(array $args = [])
 * @method \Aws\Result updateCrawler(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateCrawlerAsync(array $args = [])
 * @method \Aws\Result updateCrawlerSchedule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateCrawlerScheduleAsync(array $args = [])
 * @method \Aws\Result updateDatabase(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateDatabaseAsync(array $args = [])
 * @method \Aws\Result updateDevEndpoint(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateDevEndpointAsync(array $args = [])
 * @method \Aws\Result updateJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateJobAsync(array $args = [])
 * @method \Aws\Result updateMLTransform(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateMLTransformAsync(array $args = [])
 * @method \Aws\Result updatePartition(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updatePartitionAsync(array $args = [])
 * @method \Aws\Result updateRegistry(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateRegistryAsync(array $args = [])
 * @method \Aws\Result updateSchema(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateSchemaAsync(array $args = [])
 * @method \Aws\Result updateTable(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateTableAsync(array $args = [])
 * @method \Aws\Result updateTrigger(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateTriggerAsync(array $args = [])
 * @method \Aws\Result updateUserDefinedFunction(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateUserDefinedFunctionAsync(array $args = [])
 * @method \Aws\Result updateWorkflow(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateWorkflowAsync(array $args = [])
 */
class GlueClient extends AwsClient {}
