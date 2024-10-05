<?php
namespace Aws\StorageGateway;

use Aws\AwsClient;

/**
 * AWS Storage Gateway client.
 *
 * @method \Aws\Result activateGateway(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise activateGatewayAsync(array $args = [])
 * @method \Aws\Result addCache(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addCacheAsync(array $args = [])
 * @method \Aws\Result addTagsToResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @method \Aws\Result addUploadBuffer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addUploadBufferAsync(array $args = [])
 * @method \Aws\Result addWorkingStorage(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addWorkingStorageAsync(array $args = [])
 * @method \Aws\Result assignTapePool(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise assignTapePoolAsync(array $args = [])
 * @method \Aws\Result associateFileSystem(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise associateFileSystemAsync(array $args = [])
 * @method \Aws\Result attachVolume(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise attachVolumeAsync(array $args = [])
 * @method \Aws\Result cancelArchival(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelArchivalAsync(array $args = [])
 * @method \Aws\Result cancelRetrieval(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelRetrievalAsync(array $args = [])
 * @method \Aws\Result createCachediSCSIVolume(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createCachediSCSIVolumeAsync(array $args = [])
 * @method \Aws\Result createNFSFileShare(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createNFSFileShareAsync(array $args = [])
 * @method \Aws\Result createSMBFileShare(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createSMBFileShareAsync(array $args = [])
 * @method \Aws\Result createSnapshot(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createSnapshotAsync(array $args = [])
 * @method \Aws\Result createSnapshotFromVolumeRecoveryPoint(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createSnapshotFromVolumeRecoveryPointAsync(array $args = [])
 * @method \Aws\Result createStorediSCSIVolume(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createStorediSCSIVolumeAsync(array $args = [])
 * @method \Aws\Result createTapePool(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createTapePoolAsync(array $args = [])
 * @method \Aws\Result createTapeWithBarcode(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createTapeWithBarcodeAsync(array $args = [])
 * @method \Aws\Result createTapes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createTapesAsync(array $args = [])
 * @method \Aws\Result deleteAutomaticTapeCreationPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteAutomaticTapeCreationPolicyAsync(array $args = [])
 * @method \Aws\Result deleteBandwidthRateLimit(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteBandwidthRateLimitAsync(array $args = [])
 * @method \Aws\Result deleteChapCredentials(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteChapCredentialsAsync(array $args = [])
 * @method \Aws\Result deleteFileShare(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteFileShareAsync(array $args = [])
 * @method \Aws\Result deleteGateway(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteGatewayAsync(array $args = [])
 * @method \Aws\Result deleteSnapshotSchedule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteSnapshotScheduleAsync(array $args = [])
 * @method \Aws\Result deleteTape(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteTapeAsync(array $args = [])
 * @method \Aws\Result deleteTapeArchive(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteTapeArchiveAsync(array $args = [])
 * @method \Aws\Result deleteTapePool(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteTapePoolAsync(array $args = [])
 * @method \Aws\Result deleteVolume(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteVolumeAsync(array $args = [])
 * @method \Aws\Result describeAvailabilityMonitorTest(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeAvailabilityMonitorTestAsync(array $args = [])
 * @method \Aws\Result describeBandwidthRateLimit(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeBandwidthRateLimitAsync(array $args = [])
 * @method \Aws\Result describeBandwidthRateLimitSchedule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeBandwidthRateLimitScheduleAsync(array $args = [])
 * @method \Aws\Result describeCache(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeCacheAsync(array $args = [])
 * @method \Aws\Result describeCachediSCSIVolumes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeCachediSCSIVolumesAsync(array $args = [])
 * @method \Aws\Result describeChapCredentials(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeChapCredentialsAsync(array $args = [])
 * @method \Aws\Result describeFileSystemAssociations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeFileSystemAssociationsAsync(array $args = [])
 * @method \Aws\Result describeGatewayInformation(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeGatewayInformationAsync(array $args = [])
 * @method \Aws\Result describeMaintenanceStartTime(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeMaintenanceStartTimeAsync(array $args = [])
 * @method \Aws\Result describeNFSFileShares(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeNFSFileSharesAsync(array $args = [])
 * @method \Aws\Result describeSMBFileShares(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeSMBFileSharesAsync(array $args = [])
 * @method \Aws\Result describeSMBSettings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeSMBSettingsAsync(array $args = [])
 * @method \Aws\Result describeSnapshotSchedule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeSnapshotScheduleAsync(array $args = [])
 * @method \Aws\Result describeStorediSCSIVolumes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeStorediSCSIVolumesAsync(array $args = [])
 * @method \Aws\Result describeTapeArchives(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeTapeArchivesAsync(array $args = [])
 * @method \Aws\Result describeTapeRecoveryPoints(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeTapeRecoveryPointsAsync(array $args = [])
 * @method \Aws\Result describeTapes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeTapesAsync(array $args = [])
 * @method \Aws\Result describeUploadBuffer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeUploadBufferAsync(array $args = [])
 * @method \Aws\Result describeVTLDevices(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeVTLDevicesAsync(array $args = [])
 * @method \Aws\Result describeWorkingStorage(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeWorkingStorageAsync(array $args = [])
 * @method \Aws\Result detachVolume(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise detachVolumeAsync(array $args = [])
 * @method \Aws\Result disableGateway(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disableGatewayAsync(array $args = [])
 * @method \Aws\Result disassociateFileSystem(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disassociateFileSystemAsync(array $args = [])
 * @method \Aws\Result joinDomain(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise joinDomainAsync(array $args = [])
 * @method \Aws\Result listAutomaticTapeCreationPolicies(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAutomaticTapeCreationPoliciesAsync(array $args = [])
 * @method \Aws\Result listFileShares(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listFileSharesAsync(array $args = [])
 * @method \Aws\Result listFileSystemAssociations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listFileSystemAssociationsAsync(array $args = [])
 * @method \Aws\Result listGateways(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listGatewaysAsync(array $args = [])
 * @method \Aws\Result listLocalDisks(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listLocalDisksAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result listTapePools(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTapePoolsAsync(array $args = [])
 * @method \Aws\Result listTapes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTapesAsync(array $args = [])
 * @method \Aws\Result listVolumeInitiators(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listVolumeInitiatorsAsync(array $args = [])
 * @method \Aws\Result listVolumeRecoveryPoints(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listVolumeRecoveryPointsAsync(array $args = [])
 * @method \Aws\Result listVolumes(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listVolumesAsync(array $args = [])
 * @method \Aws\Result notifyWhenUploaded(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise notifyWhenUploadedAsync(array $args = [])
 * @method \Aws\Result refreshCache(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise refreshCacheAsync(array $args = [])
 * @method \Aws\Result removeTagsFromResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 * @method \Aws\Result resetCache(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise resetCacheAsync(array $args = [])
 * @method \Aws\Result retrieveTapeArchive(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise retrieveTapeArchiveAsync(array $args = [])
 * @method \Aws\Result retrieveTapeRecoveryPoint(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise retrieveTapeRecoveryPointAsync(array $args = [])
 * @method \Aws\Result setLocalConsolePassword(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise setLocalConsolePasswordAsync(array $args = [])
 * @method \Aws\Result setSMBGuestPassword(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise setSMBGuestPasswordAsync(array $args = [])
 * @method \Aws\Result shutdownGateway(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise shutdownGatewayAsync(array $args = [])
 * @method \Aws\Result startAvailabilityMonitorTest(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startAvailabilityMonitorTestAsync(array $args = [])
 * @method \Aws\Result startGateway(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startGatewayAsync(array $args = [])
 * @method \Aws\Result updateAutomaticTapeCreationPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateAutomaticTapeCreationPolicyAsync(array $args = [])
 * @method \Aws\Result updateBandwidthRateLimit(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateBandwidthRateLimitAsync(array $args = [])
 * @method \Aws\Result updateBandwidthRateLimitSchedule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateBandwidthRateLimitScheduleAsync(array $args = [])
 * @method \Aws\Result updateChapCredentials(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateChapCredentialsAsync(array $args = [])
 * @method \Aws\Result updateFileSystemAssociation(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateFileSystemAssociationAsync(array $args = [])
 * @method \Aws\Result updateGatewayInformation(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateGatewayInformationAsync(array $args = [])
 * @method \Aws\Result updateGatewaySoftwareNow(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateGatewaySoftwareNowAsync(array $args = [])
 * @method \Aws\Result updateMaintenanceStartTime(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateMaintenanceStartTimeAsync(array $args = [])
 * @method \Aws\Result updateNFSFileShare(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateNFSFileShareAsync(array $args = [])
 * @method \Aws\Result updateSMBFileShare(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateSMBFileShareAsync(array $args = [])
 * @method \Aws\Result updateSMBFileShareVisibility(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateSMBFileShareVisibilityAsync(array $args = [])
 * @method \Aws\Result updateSMBLocalGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateSMBLocalGroupsAsync(array $args = [])
 * @method \Aws\Result updateSMBSecurityStrategy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateSMBSecurityStrategyAsync(array $args = [])
 * @method \Aws\Result updateSnapshotSchedule(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateSnapshotScheduleAsync(array $args = [])
 * @method \Aws\Result updateVTLDeviceType(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateVTLDeviceTypeAsync(array $args = [])
 */
class StorageGatewayClient extends AwsClient {}
