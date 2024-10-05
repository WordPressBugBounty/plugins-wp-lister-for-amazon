<?php
namespace Aws\ForecastService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Forecast Service** service.
 * @method \Aws\Result createAutoPredictor(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createAutoPredictorAsync(array $args = [])
 * @method \Aws\Result createDataset(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDatasetAsync(array $args = [])
 * @method \Aws\Result createDatasetGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDatasetGroupAsync(array $args = [])
 * @method \Aws\Result createDatasetImportJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDatasetImportJobAsync(array $args = [])
 * @method \Aws\Result createExplainability(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createExplainabilityAsync(array $args = [])
 * @method \Aws\Result createExplainabilityExport(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createExplainabilityExportAsync(array $args = [])
 * @method \Aws\Result createForecast(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createForecastAsync(array $args = [])
 * @method \Aws\Result createForecastExportJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createForecastExportJobAsync(array $args = [])
 * @method \Aws\Result createMonitor(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createMonitorAsync(array $args = [])
 * @method \Aws\Result createPredictor(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createPredictorAsync(array $args = [])
 * @method \Aws\Result createPredictorBacktestExportJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createPredictorBacktestExportJobAsync(array $args = [])
 * @method \Aws\Result deleteDataset(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @method \Aws\Result deleteDatasetGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDatasetGroupAsync(array $args = [])
 * @method \Aws\Result deleteDatasetImportJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDatasetImportJobAsync(array $args = [])
 * @method \Aws\Result deleteExplainability(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteExplainabilityAsync(array $args = [])
 * @method \Aws\Result deleteExplainabilityExport(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteExplainabilityExportAsync(array $args = [])
 * @method \Aws\Result deleteForecast(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteForecastAsync(array $args = [])
 * @method \Aws\Result deleteForecastExportJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteForecastExportJobAsync(array $args = [])
 * @method \Aws\Result deleteMonitor(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteMonitorAsync(array $args = [])
 * @method \Aws\Result deletePredictor(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deletePredictorAsync(array $args = [])
 * @method \Aws\Result deletePredictorBacktestExportJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deletePredictorBacktestExportJobAsync(array $args = [])
 * @method \Aws\Result deleteResourceTree(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteResourceTreeAsync(array $args = [])
 * @method \Aws\Result describeAutoPredictor(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeAutoPredictorAsync(array $args = [])
 * @method \Aws\Result describeDataset(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDatasetAsync(array $args = [])
 * @method \Aws\Result describeDatasetGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDatasetGroupAsync(array $args = [])
 * @method \Aws\Result describeDatasetImportJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDatasetImportJobAsync(array $args = [])
 * @method \Aws\Result describeExplainability(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeExplainabilityAsync(array $args = [])
 * @method \Aws\Result describeExplainabilityExport(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeExplainabilityExportAsync(array $args = [])
 * @method \Aws\Result describeForecast(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeForecastAsync(array $args = [])
 * @method \Aws\Result describeForecastExportJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeForecastExportJobAsync(array $args = [])
 * @method \Aws\Result describeMonitor(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeMonitorAsync(array $args = [])
 * @method \Aws\Result describePredictor(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describePredictorAsync(array $args = [])
 * @method \Aws\Result describePredictorBacktestExportJob(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describePredictorBacktestExportJobAsync(array $args = [])
 * @method \Aws\Result getAccuracyMetrics(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getAccuracyMetricsAsync(array $args = [])
 * @method \Aws\Result listDatasetGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDatasetGroupsAsync(array $args = [])
 * @method \Aws\Result listDatasetImportJobs(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDatasetImportJobsAsync(array $args = [])
 * @method \Aws\Result listDatasets(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @method \Aws\Result listExplainabilities(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listExplainabilitiesAsync(array $args = [])
 * @method \Aws\Result listExplainabilityExports(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listExplainabilityExportsAsync(array $args = [])
 * @method \Aws\Result listForecastExportJobs(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listForecastExportJobsAsync(array $args = [])
 * @method \Aws\Result listForecasts(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listForecastsAsync(array $args = [])
 * @method \Aws\Result listMonitorEvaluations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listMonitorEvaluationsAsync(array $args = [])
 * @method \Aws\Result listMonitors(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listMonitorsAsync(array $args = [])
 * @method \Aws\Result listPredictorBacktestExportJobs(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listPredictorBacktestExportJobsAsync(array $args = [])
 * @method \Aws\Result listPredictors(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listPredictorsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result resumeResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise resumeResourceAsync(array $args = [])
 * @method \Aws\Result stopResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise stopResourceAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateDatasetGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateDatasetGroupAsync(array $args = [])
 */
class ForecastServiceClient extends AwsClient {}
