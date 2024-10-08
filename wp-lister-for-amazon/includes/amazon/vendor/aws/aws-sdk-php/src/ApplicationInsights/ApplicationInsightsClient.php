<?php
namespace Aws\ApplicationInsights;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudWatch Application Insights** service.
 * @method \Aws\Result createApplication(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @method \Aws\Result createComponent(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createComponentAsync(array $args = [])
 * @method \Aws\Result createLogPattern(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createLogPatternAsync(array $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @method \Aws\Result deleteComponent(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteComponentAsync(array $args = [])
 * @method \Aws\Result deleteLogPattern(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteLogPatternAsync(array $args = [])
 * @method \Aws\Result describeApplication(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeApplicationAsync(array $args = [])
 * @method \Aws\Result describeComponent(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeComponentAsync(array $args = [])
 * @method \Aws\Result describeComponentConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeComponentConfigurationAsync(array $args = [])
 * @method \Aws\Result describeComponentConfigurationRecommendation(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeComponentConfigurationRecommendationAsync(array $args = [])
 * @method \Aws\Result describeLogPattern(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeLogPatternAsync(array $args = [])
 * @method \Aws\Result describeObservation(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeObservationAsync(array $args = [])
 * @method \Aws\Result describeProblem(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeProblemAsync(array $args = [])
 * @method \Aws\Result describeProblemObservations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeProblemObservationsAsync(array $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @method \Aws\Result listComponents(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listComponentsAsync(array $args = [])
 * @method \Aws\Result listConfigurationHistory(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listConfigurationHistoryAsync(array $args = [])
 * @method \Aws\Result listLogPatternSets(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listLogPatternSetsAsync(array $args = [])
 * @method \Aws\Result listLogPatterns(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listLogPatternsAsync(array $args = [])
 * @method \Aws\Result listProblems(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listProblemsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @method \Aws\Result updateComponent(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateComponentAsync(array $args = [])
 * @method \Aws\Result updateComponentConfiguration(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateComponentConfigurationAsync(array $args = [])
 * @method \Aws\Result updateLogPattern(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateLogPatternAsync(array $args = [])
 */
class ApplicationInsightsClient extends AwsClient {}
