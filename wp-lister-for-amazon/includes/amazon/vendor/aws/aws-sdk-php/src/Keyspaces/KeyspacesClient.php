<?php
namespace Aws\Keyspaces;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Keyspaces** service.
 * @method \Aws\Result createKeyspace(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createKeyspaceAsync(array $args = [])
 * @method \Aws\Result createTable(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createTableAsync(array $args = [])
 * @method \Aws\Result deleteKeyspace(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteKeyspaceAsync(array $args = [])
 * @method \Aws\Result deleteTable(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteTableAsync(array $args = [])
 * @method \Aws\Result getKeyspace(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getKeyspaceAsync(array $args = [])
 * @method \Aws\Result getTable(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getTableAsync(array $args = [])
 * @method \Aws\Result listKeyspaces(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listKeyspacesAsync(array $args = [])
 * @method \Aws\Result listTables(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTablesAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result restoreTable(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise restoreTableAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateTable(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateTableAsync(array $args = [])
 */
class KeyspacesClient extends AwsClient {}
