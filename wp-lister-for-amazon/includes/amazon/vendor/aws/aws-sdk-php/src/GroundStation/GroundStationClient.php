<?php
namespace Aws\GroundStation;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Ground Station** service.
 * @method \Aws\Result cancelContact(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelContactAsync(array $args = [])
 * @method \Aws\Result createConfig(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createConfigAsync(array $args = [])
 * @method \Aws\Result createDataflowEndpointGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDataflowEndpointGroupAsync(array $args = [])
 * @method \Aws\Result createMissionProfile(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createMissionProfileAsync(array $args = [])
 * @method \Aws\Result deleteConfig(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteConfigAsync(array $args = [])
 * @method \Aws\Result deleteDataflowEndpointGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDataflowEndpointGroupAsync(array $args = [])
 * @method \Aws\Result deleteMissionProfile(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteMissionProfileAsync(array $args = [])
 * @method \Aws\Result describeContact(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeContactAsync(array $args = [])
 * @method \Aws\Result getMissionProfileConfig(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMissionProfileConfigAsync(array $args = [])
 * @method \Aws\Result getDataflowEndpointGroup(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDataflowEndpointGroupAsync(array $args = [])
 * @method \Aws\Result getMinuteUsage(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMinuteUsageAsync(array $args = [])
 * @method \Aws\Result getMissionProfile(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getMissionProfileAsync(array $args = [])
 * @method \Aws\Result getSatellite(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getSatelliteAsync(array $args = [])
 * @method \Aws\Result listConfigs(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listConfigsAsync(array $args = [])
 * @method \Aws\Result listContacts(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listContactsAsync(array $args = [])
 * @method \Aws\Result listDataflowEndpointGroups(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDataflowEndpointGroupsAsync(array $args = [])
 * @method \Aws\Result listGroundStations(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listGroundStationsAsync(array $args = [])
 * @method \Aws\Result listMissionProfiles(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listMissionProfilesAsync(array $args = [])
 * @method \Aws\Result listSatellites(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listSatellitesAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result reserveContact(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise reserveContactAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateConfig(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateConfigAsync(array $args = [])
 * @method \Aws\Result updateMissionProfile(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateMissionProfileAsync(array $args = [])
 */
class GroundStationClient extends AwsClient {}
