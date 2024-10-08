<?php
namespace Aws\IotDataPlane;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Data Plane** service.
 *
 * @method \Aws\Result deleteThingShadow(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteThingShadowAsync(array $args = [])
 * @method \Aws\Result getRetainedMessage(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getRetainedMessageAsync(array $args = [])
 * @method \Aws\Result getThingShadow(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getThingShadowAsync(array $args = [])
 * @method \Aws\Result listNamedShadowsForThing(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listNamedShadowsForThingAsync(array $args = [])
 * @method \Aws\Result listRetainedMessages(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listRetainedMessagesAsync(array $args = [])
 * @method \Aws\Result publish(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise publishAsync(array $args = [])
 * @method \Aws\Result updateThingShadow(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateThingShadowAsync(array $args = [])
 */
class IotDataPlaneClient extends AwsClient {}
