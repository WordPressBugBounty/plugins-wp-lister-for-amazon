<?php
namespace Aws\LookoutEquipment;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Lookout for Equipment** service.
 * @method \Aws\Result createDataset(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDatasetAsync(array $args = [])
 * @method \Aws\Result createInferenceScheduler(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createInferenceSchedulerAsync(array $args = [])
 * @method \Aws\Result createModel(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createModelAsync(array $args = [])
 * @method \Aws\Result deleteDataset(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @method \Aws\Result deleteInferenceScheduler(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteInferenceSchedulerAsync(array $args = [])
 * @method \Aws\Result deleteModel(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteModelAsync(array $args = [])
 * @method \Aws\Result describeDataIngestionJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDataIngestionJobAsync(array $args = [])
 * @method \Aws\Result describeDataset(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDatasetAsync(array $args = [])
 * @method \Aws\Result describeInferenceScheduler(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeInferenceSchedulerAsync(array $args = [])
 * @method \Aws\Result describeModel(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeModelAsync(array $args = [])
 * @method \Aws\Result listDataIngestionJobs(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDataIngestionJobsAsync(array $args = [])
 * @method \Aws\Result listDatasets(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @method \Aws\Result listInferenceEvents(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listInferenceEventsAsync(array $args = [])
 * @method \Aws\Result listInferenceExecutions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listInferenceExecutionsAsync(array $args = [])
 * @method \Aws\Result listInferenceSchedulers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listInferenceSchedulersAsync(array $args = [])
 * @method \Aws\Result listModels(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listModelsAsync(array $args = [])
 * @method \Aws\Result listSensorStatistics(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listSensorStatisticsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result startDataIngestionJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startDataIngestionJobAsync(array $args = [])
 * @method \Aws\Result startInferenceScheduler(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startInferenceSchedulerAsync(array $args = [])
 * @method \Aws\Result stopInferenceScheduler(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise stopInferenceSchedulerAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateInferenceScheduler(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateInferenceSchedulerAsync(array $args = [])
 */
class LookoutEquipmentClient extends AwsClient {}
