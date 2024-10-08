<?php
namespace Aws\MediaConnect;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS MediaConnect** service.
 * @method \Aws\Result addFlowMediaStreams(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addFlowMediaStreamsAsync(array $args = [])
 * @method \Aws\Result addFlowOutputs(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addFlowOutputsAsync(array $args = [])
 * @method \Aws\Result addFlowSources(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addFlowSourcesAsync(array $args = [])
 * @method \Aws\Result addFlowVpcInterfaces(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise addFlowVpcInterfacesAsync(array $args = [])
 * @method \Aws\Result createFlow(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createFlowAsync(array $args = [])
 * @method \Aws\Result deleteFlow(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteFlowAsync(array $args = [])
 * @method \Aws\Result describeFlow(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeFlowAsync(array $args = [])
 * @method \Aws\Result describeOffering(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeOfferingAsync(array $args = [])
 * @method \Aws\Result describeReservation(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeReservationAsync(array $args = [])
 * @method \Aws\Result grantFlowEntitlements(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise grantFlowEntitlementsAsync(array $args = [])
 * @method \Aws\Result listEntitlements(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listEntitlementsAsync(array $args = [])
 * @method \Aws\Result listFlows(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listFlowsAsync(array $args = [])
 * @method \Aws\Result listOfferings(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listOfferingsAsync(array $args = [])
 * @method \Aws\Result listReservations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listReservationsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result purchaseOffering(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise purchaseOfferingAsync(array $args = [])
 * @method \Aws\Result removeFlowMediaStream(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise removeFlowMediaStreamAsync(array $args = [])
 * @method \Aws\Result removeFlowOutput(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise removeFlowOutputAsync(array $args = [])
 * @method \Aws\Result removeFlowSource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise removeFlowSourceAsync(array $args = [])
 * @method \Aws\Result removeFlowVpcInterface(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise removeFlowVpcInterfaceAsync(array $args = [])
 * @method \Aws\Result revokeFlowEntitlement(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise revokeFlowEntitlementAsync(array $args = [])
 * @method \Aws\Result startFlow(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startFlowAsync(array $args = [])
 * @method \Aws\Result stopFlow(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise stopFlowAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateFlow(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateFlowAsync(array $args = [])
 * @method \Aws\Result updateFlowEntitlement(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateFlowEntitlementAsync(array $args = [])
 * @method \Aws\Result updateFlowMediaStream(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateFlowMediaStreamAsync(array $args = [])
 * @method \Aws\Result updateFlowOutput(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateFlowOutputAsync(array $args = [])
 * @method \Aws\Result updateFlowSource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateFlowSourceAsync(array $args = [])
 */
class MediaConnectClient extends AwsClient {}
