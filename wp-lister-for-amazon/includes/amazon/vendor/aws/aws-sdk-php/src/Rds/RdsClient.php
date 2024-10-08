<?php
namespace Aws\Rds;

use Aws\AwsClient;
use Aws\Api\Service;
use Aws\Api\DocModel;
use Aws\Api\ApiProvider;
use Aws\PresignUrlMiddleware;

/**
 * This client is used to interact with the **Amazon Relational Database Service (Amazon RDS)**.
 *
 * @method \Aws\Result addSourceIdentifierToSubscription(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addSourceIdentifierToSubscriptionAsync(array $args = [])
 * @method \Aws\Result addTagsToResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @method \Aws\Result authorizeDBSecurityGroupIngress(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise authorizeDBSecurityGroupIngressAsync(array $args = [])
 * @method \Aws\Result copyDBParameterGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise copyDBParameterGroupAsync(array $args = [])
 * @method \Aws\Result copyDBSnapshot(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise copyDBSnapshotAsync(array $args = [])
 * @method \Aws\Result copyOptionGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise copyOptionGroupAsync(array $args = [])
 * @method \Aws\Result createDBInstance(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDBInstanceAsync(array $args = [])
 * @method \Aws\Result createDBInstanceReadReplica(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDBInstanceReadReplicaAsync(array $args = [])
 * @method \Aws\Result createDBParameterGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDBParameterGroupAsync(array $args = [])
 * @method \Aws\Result createDBSecurityGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDBSecurityGroupAsync(array $args = [])
 * @method \Aws\Result createDBSnapshot(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDBSnapshotAsync(array $args = [])
 * @method \Aws\Result createDBSubnetGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDBSubnetGroupAsync(array $args = [])
 * @method \Aws\Result createEventSubscription(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createEventSubscriptionAsync(array $args = [])
 * @method \Aws\Result createOptionGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createOptionGroupAsync(array $args = [])
 * @method \Aws\Result deleteDBInstance(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDBInstanceAsync(array $args = [])
 * @method \Aws\Result deleteDBParameterGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDBParameterGroupAsync(array $args = [])
 * @method \Aws\Result deleteDBSecurityGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDBSecurityGroupAsync(array $args = [])
 * @method \Aws\Result deleteDBSnapshot(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDBSnapshotAsync(array $args = [])
 * @method \Aws\Result deleteDBSubnetGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDBSubnetGroupAsync(array $args = [])
 * @method \Aws\Result deleteEventSubscription(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteEventSubscriptionAsync(array $args = [])
 * @method \Aws\Result deleteOptionGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteOptionGroupAsync(array $args = [])
 * @method \Aws\Result describeDBEngineVersions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBEngineVersionsAsync(array $args = [])
 * @method \Aws\Result describeDBInstances(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBInstancesAsync(array $args = [])
 * @method \Aws\Result describeDBLogFiles(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBLogFilesAsync(array $args = [])
 * @method \Aws\Result describeDBParameterGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBParameterGroupsAsync(array $args = [])
 * @method \Aws\Result describeDBParameters(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBParametersAsync(array $args = [])
 * @method \Aws\Result describeDBSecurityGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBSecurityGroupsAsync(array $args = [])
 * @method \Aws\Result describeDBSnapshots(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBSnapshotsAsync(array $args = [])
 * @method \Aws\Result describeDBSubnetGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBSubnetGroupsAsync(array $args = [])
 * @method \Aws\Result describeEngineDefaultParameters(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeEngineDefaultParametersAsync(array $args = [])
 * @method \Aws\Result describeEventCategories(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeEventCategoriesAsync(array $args = [])
 * @method \Aws\Result describeEventSubscriptions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeEventSubscriptionsAsync(array $args = [])
 * @method \Aws\Result describeEvents(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @method \Aws\Result describeOptionGroupOptions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeOptionGroupOptionsAsync(array $args = [])
 * @method \Aws\Result describeOptionGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeOptionGroupsAsync(array $args = [])
 * @method \Aws\Result describeOrderableDBInstanceOptions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeOrderableDBInstanceOptionsAsync(array $args = [])
 * @method \Aws\Result describeReservedDBInstances(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeReservedDBInstancesAsync(array $args = [])
 * @method \Aws\Result describeReservedDBInstancesOfferings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeReservedDBInstancesOfferingsAsync(array $args = [])
 * @method \Aws\Result downloadDBLogFilePortion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise downloadDBLogFilePortionAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result modifyDBInstance(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyDBInstanceAsync(array $args = [])
 * @method \Aws\Result modifyDBParameterGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyDBParameterGroupAsync(array $args = [])
 * @method \Aws\Result modifyDBSubnetGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyDBSubnetGroupAsync(array $args = [])
 * @method \Aws\Result modifyEventSubscription(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyEventSubscriptionAsync(array $args = [])
 * @method \Aws\Result modifyOptionGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyOptionGroupAsync(array $args = [])
 * @method \Aws\Result promoteReadReplica(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise promoteReadReplicaAsync(array $args = [])
 * @method \Aws\Result purchaseReservedDBInstancesOffering(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise purchaseReservedDBInstancesOfferingAsync(array $args = [])
 * @method \Aws\Result rebootDBInstance(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise rebootDBInstanceAsync(array $args = [])
 * @method \Aws\Result removeSourceIdentifierFromSubscription(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise removeSourceIdentifierFromSubscriptionAsync(array $args = [])
 * @method \Aws\Result removeTagsFromResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 * @method \Aws\Result resetDBParameterGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise resetDBParameterGroupAsync(array $args = [])
 * @method \Aws\Result restoreDBInstanceFromDBSnapshot(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise restoreDBInstanceFromDBSnapshotAsync(array $args = [])
 * @method \Aws\Result restoreDBInstanceToPointInTime(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise restoreDBInstanceToPointInTimeAsync(array $args = [])
 * @method \Aws\Result revokeDBSecurityGroupIngress(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise revokeDBSecurityGroupIngressAsync(array $args = [])
 * @method \Aws\Result addRoleToDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise addRoleToDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result addRoleToDBInstance(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise addRoleToDBInstanceAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result applyPendingMaintenanceAction(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise applyPendingMaintenanceActionAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result backtrackDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise backtrackDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result cancelExportTask(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelExportTaskAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result copyDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise copyDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result copyDBClusterSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise copyDBClusterSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result createCustomDBEngineVersion(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise createCustomDBEngineVersionAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result createDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise createDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result createDBClusterEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise createDBClusterEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result createDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise createDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result createDBClusterSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise createDBClusterSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result createDBProxy(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise createDBProxyAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result createDBProxyEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise createDBProxyEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result createGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise createGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result deleteCustomDBEngineVersion(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteCustomDBEngineVersionAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result deleteDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result deleteDBClusterEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDBClusterEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result deleteDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result deleteDBClusterSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDBClusterSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result deleteDBInstanceAutomatedBackup(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDBInstanceAutomatedBackupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result deleteDBProxy(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDBProxyAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result deleteDBProxyEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDBProxyEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result deleteGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result deregisterDBProxyTargets(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise deregisterDBProxyTargetsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeAccountAttributes(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeAccountAttributesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeCertificates(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeCertificatesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeDBClusterBacktracks(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBClusterBacktracksAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeDBClusterEndpoints(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBClusterEndpointsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeDBClusterParameterGroups(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBClusterParameterGroupsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeDBClusterParameters(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBClusterParametersAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeDBClusterSnapshotAttributes(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBClusterSnapshotAttributesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeDBClusterSnapshots(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBClusterSnapshotsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeDBClusters(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBClustersAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeDBInstanceAutomatedBackups(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBInstanceAutomatedBackupsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeDBProxies(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBProxiesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeDBProxyEndpoints(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBProxyEndpointsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeDBProxyTargetGroups(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBProxyTargetGroupsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeDBProxyTargets(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBProxyTargetsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeDBSnapshotAttributes(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDBSnapshotAttributesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeEngineDefaultClusterParameters(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeEngineDefaultClusterParametersAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeExportTasks(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeExportTasksAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeGlobalClusters(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeGlobalClustersAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describePendingMaintenanceActions(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describePendingMaintenanceActionsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeSourceRegions(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeSourceRegionsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result describeValidDBInstanceModifications(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise describeValidDBInstanceModificationsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result failoverDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise failoverDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result failoverGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise failoverGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result modifyActivityStream(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyActivityStreamAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result modifyCertificates(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyCertificatesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result modifyCurrentDBClusterCapacity(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyCurrentDBClusterCapacityAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result modifyCustomDBEngineVersion(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyCustomDBEngineVersionAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result modifyDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result modifyDBClusterEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyDBClusterEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result modifyDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result modifyDBClusterSnapshotAttribute(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyDBClusterSnapshotAttributeAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result modifyDBProxy(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyDBProxyAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result modifyDBProxyEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyDBProxyEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result modifyDBProxyTargetGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyDBProxyTargetGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result modifyDBSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyDBSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result modifyDBSnapshotAttribute(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyDBSnapshotAttributeAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result modifyGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise modifyGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result promoteReadReplicaDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise promoteReadReplicaDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result rebootDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise rebootDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result registerDBProxyTargets(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise registerDBProxyTargetsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result removeFromGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise removeFromGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result removeRoleFromDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise removeRoleFromDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result removeRoleFromDBInstance(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise removeRoleFromDBInstanceAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result resetDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise resetDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result restoreDBClusterFromS3(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise restoreDBClusterFromS3Async(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result restoreDBClusterFromSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise restoreDBClusterFromSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result restoreDBClusterToPointInTime(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise restoreDBClusterToPointInTimeAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result restoreDBInstanceFromS3(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise restoreDBInstanceFromS3Async(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result startActivityStream(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise startActivityStreamAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result startDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise startDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result startDBInstance(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise startDBInstanceAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result startDBInstanceAutomatedBackupsReplication(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise startDBInstanceAutomatedBackupsReplicationAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result startExportTask(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise startExportTaskAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result stopActivityStream(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise stopActivityStreamAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result stopDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise stopDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result stopDBInstance(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise stopDBInstanceAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \Aws\Result stopDBInstanceAutomatedBackupsReplication(array $args = []) (supported in versions 2014-10-31)
 * @method \WPLab\GuzzeHttp\Promise\Promise stopDBInstanceAutomatedBackupsReplicationAsync(array $args = []) (supported in versions 2014-10-31)
 */
class RdsClient extends AwsClient
{
    public function __construct(array $args)
    {
        $args['with_resolved'] = function (array $args) {
            $this->getHandlerList()->appendInit(
                PresignUrlMiddleware::wrap(
                    $this,
                    $args['endpoint_provider'],
                    [
                        'operations' => [
                            'CopyDBSnapshot',
                            'CreateDBInstanceReadReplica',
                            'CopyDBClusterSnapshot',
                            'CreateDBCluster',
                            'StartDBInstanceAutomatedBackupsReplication'
                        ],
                        'service' => 'rds',
                        'presign_param' => 'PreSignedUrl',
                        'require_different_region' => true,
                    ]
                ),
                'rds.presigner'
            );
        };

        parent::__construct($args);
    }

    /**
     * @internal
     * @codeCoverageIgnore
     */
    public static function applyDocFilters(array $api, array $docs)
    {
        // Add the SourceRegion parameter
        $docs['shapes']['SourceRegion']['base'] = 'A required parameter that indicates '
            . 'the region that the DB snapshot will be copied from.';
        $api['shapes']['SourceRegion'] = ['type' => 'string'];
        $api['shapes']['CopyDBSnapshotMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];
        $api['shapes']['CreateDBInstanceReadReplicaMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];

        // Add the DestinationRegion parameter
        $docs['shapes']['DestinationRegion']['base']
            = '<div class="alert alert-info">The SDK will populate this '
            . 'parameter on your behalf using the configured region value of '
            . 'the client.</div>';
        $api['shapes']['DestinationRegion'] = ['type' => 'string'];
        $api['shapes']['CopyDBSnapshotMessage']['members']['DestinationRegion'] = ['shape' => 'DestinationRegion'];
        $api['shapes']['CreateDBInstanceReadReplicaMessage']['members']['DestinationRegion'] = ['shape' => 'DestinationRegion'];

        // Several parameters in presign APIs are optional.
        $docs['shapes']['String']['refs']['CopyDBSnapshotMessage$PreSignedUrl']
            = '<div class="alert alert-info">The SDK will compute this value '
            . 'for you on your behalf.</div>';
        $docs['shapes']['String']['refs']['CopyDBSnapshotMessage$DestinationRegion']
            = '<div class="alert alert-info">The SDK will populate this '
            . 'parameter on your behalf using the configured region value of '
            . 'the client.</div>';

        // Several parameters in presign APIs are optional.
        $docs['shapes']['String']['refs']['CreateDBInstanceReadReplicaMessage$PreSignedUrl']
            = '<div class="alert alert-info">The SDK will compute this value '
            . 'for you on your behalf.</div>';
        $docs['shapes']['String']['refs']['CreateDBInstanceReadReplicaMessage$DestinationRegion']
            = '<div class="alert alert-info">The SDK will populate this '
            . 'parameter on your behalf using the configured region value of '
            . 'the client.</div>';

        if ($api['metadata']['apiVersion'] != '2014-09-01') {
            $api['shapes']['CopyDBClusterSnapshotMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];
            $api['shapes']['CreateDBClusterMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];

            $api['shapes']['CopyDBClusterSnapshotMessage']['members']['DestinationRegion'] = ['shape' => 'DestinationRegion'];
            $api['shapes']['CreateDBClusterMessage']['members']['DestinationRegion'] = ['shape' => 'DestinationRegion'];

            // Several parameters in presign APIs are optional.
            $docs['shapes']['String']['refs']['CopyDBClusterSnapshotMessage$PreSignedUrl']
                = '<div class="alert alert-info">The SDK will compute this value '
                . 'for you on your behalf.</div>';
            $docs['shapes']['String']['refs']['CopyDBClusterSnapshotMessage$DestinationRegion']
                = '<div class="alert alert-info">The SDK will populate this '
                . 'parameter on your behalf using the configured region value of '
                . 'the client.</div>';

            // Several parameters in presign APIs are optional.
            $docs['shapes']['String']['refs']['CreateDBClusterMessage$PreSignedUrl']
                = '<div class="alert alert-info">The SDK will compute this value '
                . 'for you on your behalf.</div>';
            $docs['shapes']['String']['refs']['CreateDBClusterMessage$DestinationRegion']
                = '<div class="alert alert-info">The SDK will populate this '
                . 'parameter on your behalf using the configured region value of '
                . 'the client.</div>';
        }

        return [
            new Service($api, ApiProvider::defaultProvider()),
            new DocModel($docs)
        ];
    }
}
