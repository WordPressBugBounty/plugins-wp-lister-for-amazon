<?php
namespace Aws\KinesisAnalyticsV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Analytics** service.
 * @method \Aws\Result addApplicationCloudWatchLoggingOption(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addApplicationCloudWatchLoggingOptionAsync(array $args = [])
 * @method \Aws\Result addApplicationInput(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addApplicationInputAsync(array $args = [])
 * @method \Aws\Result addApplicationInputProcessingConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addApplicationInputProcessingConfigurationAsync(array $args = [])
 * @method \Aws\Result addApplicationOutput(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addApplicationOutputAsync(array $args = [])
 * @method \Aws\Result addApplicationReferenceDataSource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addApplicationReferenceDataSourceAsync(array $args = [])
 * @method \Aws\Result addApplicationVpcConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addApplicationVpcConfigurationAsync(array $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @method \Aws\Result createApplicationPresignedUrl(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createApplicationPresignedUrlAsync(array $args = [])
 * @method \Aws\Result createApplicationSnapshot(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createApplicationSnapshotAsync(array $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @method \Aws\Result deleteApplicationCloudWatchLoggingOption(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteApplicationCloudWatchLoggingOptionAsync(array $args = [])
 * @method \Aws\Result deleteApplicationInputProcessingConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteApplicationInputProcessingConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteApplicationOutput(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteApplicationOutputAsync(array $args = [])
 * @method \Aws\Result deleteApplicationReferenceDataSource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteApplicationReferenceDataSourceAsync(array $args = [])
 * @method \Aws\Result deleteApplicationSnapshot(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteApplicationSnapshotAsync(array $args = [])
 * @method \Aws\Result deleteApplicationVpcConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteApplicationVpcConfigurationAsync(array $args = [])
 * @method \Aws\Result describeApplication(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeApplicationAsync(array $args = [])
 * @method \Aws\Result describeApplicationSnapshot(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeApplicationSnapshotAsync(array $args = [])
 * @method \Aws\Result describeApplicationVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeApplicationVersionAsync(array $args = [])
 * @method \Aws\Result discoverInputSchema(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise discoverInputSchemaAsync(array $args = [])
 * @method \Aws\Result listApplicationSnapshots(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listApplicationSnapshotsAsync(array $args = [])
 * @method \Aws\Result listApplicationVersions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listApplicationVersionsAsync(array $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result rollbackApplication(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise rollbackApplicationAsync(array $args = [])
 * @method \Aws\Result startApplication(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startApplicationAsync(array $args = [])
 * @method \Aws\Result stopApplication(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise stopApplicationAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @method \Aws\Result updateApplicationMaintenanceConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateApplicationMaintenanceConfigurationAsync(array $args = [])
 */
class KinesisAnalyticsV2Client extends AwsClient {}
