<?php
namespace Aws\Schemas;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Schemas** service.
 * @method \Aws\Result createDiscoverer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createDiscovererAsync(array $args = [])
 * @method \Aws\Result createRegistry(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createRegistryAsync(array $args = [])
 * @method \Aws\Result createSchema(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createSchemaAsync(array $args = [])
 * @method \Aws\Result deleteDiscoverer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteDiscovererAsync(array $args = [])
 * @method \Aws\Result deleteRegistry(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteRegistryAsync(array $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @method \Aws\Result deleteSchema(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteSchemaAsync(array $args = [])
 * @method \Aws\Result deleteSchemaVersion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteSchemaVersionAsync(array $args = [])
 * @method \Aws\Result describeCodeBinding(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeCodeBindingAsync(array $args = [])
 * @method \Aws\Result describeDiscoverer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeDiscovererAsync(array $args = [])
 * @method \Aws\Result describeRegistry(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeRegistryAsync(array $args = [])
 * @method \Aws\Result describeSchema(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeSchemaAsync(array $args = [])
 * @method \Aws\Result getCodeBindingSource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getCodeBindingSourceAsync(array $args = [])
 * @method \Aws\Result getDiscoveredSchema(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getDiscoveredSchemaAsync(array $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @method \Aws\Result listDiscoverers(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listDiscoverersAsync(array $args = [])
 * @method \Aws\Result listRegistries(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listRegistriesAsync(array $args = [])
 * @method \Aws\Result listSchemaVersions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listSchemaVersionsAsync(array $args = [])
 * @method \Aws\Result listSchemas(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listSchemasAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result putCodeBinding(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putCodeBindingAsync(array $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @method \Aws\Result searchSchemas(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise searchSchemasAsync(array $args = [])
 * @method \Aws\Result startDiscoverer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise startDiscovererAsync(array $args = [])
 * @method \Aws\Result stopDiscoverer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise stopDiscovererAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateDiscoverer(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateDiscovererAsync(array $args = [])
 * @method \Aws\Result updateRegistry(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateRegistryAsync(array $args = [])
 * @method \Aws\Result updateSchema(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateSchemaAsync(array $args = [])
 * @method \Aws\Result exportSchema(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise exportSchemaAsync(array $args = [])
 */
class SchemasClient extends AwsClient {}
