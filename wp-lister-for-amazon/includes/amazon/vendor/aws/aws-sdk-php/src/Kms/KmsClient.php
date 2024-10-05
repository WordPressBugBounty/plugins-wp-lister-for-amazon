<?php
namespace Aws\Kms;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Key Management Service**.
 *
 * @method \Aws\Result cancelKeyDeletion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise cancelKeyDeletionAsync(array $args = [])
 * @method \Aws\Result connectCustomKeyStore(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise connectCustomKeyStoreAsync(array $args = [])
 * @method \Aws\Result createAlias(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createAliasAsync(array $args = [])
 * @method \Aws\Result createCustomKeyStore(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createCustomKeyStoreAsync(array $args = [])
 * @method \Aws\Result createGrant(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createGrantAsync(array $args = [])
 * @method \Aws\Result createKey(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createKeyAsync(array $args = [])
 * @method \Aws\Result decrypt(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise decryptAsync(array $args = [])
 * @method \Aws\Result deleteAlias(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteAliasAsync(array $args = [])
 * @method \Aws\Result deleteCustomKeyStore(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteCustomKeyStoreAsync(array $args = [])
 * @method \Aws\Result deleteImportedKeyMaterial(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteImportedKeyMaterialAsync(array $args = [])
 * @method \Aws\Result describeCustomKeyStores(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeCustomKeyStoresAsync(array $args = [])
 * @method \Aws\Result describeKey(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeKeyAsync(array $args = [])
 * @method \Aws\Result disableKey(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disableKeyAsync(array $args = [])
 * @method \Aws\Result disableKeyRotation(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disableKeyRotationAsync(array $args = [])
 * @method \Aws\Result disconnectCustomKeyStore(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise disconnectCustomKeyStoreAsync(array $args = [])
 * @method \Aws\Result enableKey(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise enableKeyAsync(array $args = [])
 * @method \Aws\Result enableKeyRotation(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise enableKeyRotationAsync(array $args = [])
 * @method \Aws\Result encrypt(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise encryptAsync(array $args = [])
 * @method \Aws\Result generateDataKey(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise generateDataKeyAsync(array $args = [])
 * @method \Aws\Result generateDataKeyPair(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise generateDataKeyPairAsync(array $args = [])
 * @method \Aws\Result generateDataKeyPairWithoutPlaintext(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise generateDataKeyPairWithoutPlaintextAsync(array $args = [])
 * @method \Aws\Result generateDataKeyWithoutPlaintext(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise generateDataKeyWithoutPlaintextAsync(array $args = [])
 * @method \Aws\Result generateMac(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise generateMacAsync(array $args = [])
 * @method \Aws\Result generateRandom(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise generateRandomAsync(array $args = [])
 * @method \Aws\Result getKeyPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getKeyPolicyAsync(array $args = [])
 * @method \Aws\Result getKeyRotationStatus(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getKeyRotationStatusAsync(array $args = [])
 * @method \Aws\Result getParametersForImport(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getParametersForImportAsync(array $args = [])
 * @method \Aws\Result getPublicKey(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getPublicKeyAsync(array $args = [])
 * @method \Aws\Result importKeyMaterial(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise importKeyMaterialAsync(array $args = [])
 * @method \Aws\Result listAliases(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listAliasesAsync(array $args = [])
 * @method \Aws\Result listGrants(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listGrantsAsync(array $args = [])
 * @method \Aws\Result listKeyPolicies(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listKeyPoliciesAsync(array $args = [])
 * @method \Aws\Result listKeys(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listKeysAsync(array $args = [])
 * @method \Aws\Result listResourceTags(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listResourceTagsAsync(array $args = [])
 * @method \Aws\Result listRetirableGrants(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listRetirableGrantsAsync(array $args = [])
 * @method \Aws\Result putKeyPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putKeyPolicyAsync(array $args = [])
 * @method \Aws\Result reEncrypt(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise reEncryptAsync(array $args = [])
 * @method \Aws\Result replicateKey(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise replicateKeyAsync(array $args = [])
 * @method \Aws\Result retireGrant(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise retireGrantAsync(array $args = [])
 * @method \Aws\Result revokeGrant(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise revokeGrantAsync(array $args = [])
 * @method \Aws\Result scheduleKeyDeletion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise scheduleKeyDeletionAsync(array $args = [])
 * @method \Aws\Result sign(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise signAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateAlias(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateAliasAsync(array $args = [])
 * @method \Aws\Result updateCustomKeyStore(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateCustomKeyStoreAsync(array $args = [])
 * @method \Aws\Result updateKeyDescription(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateKeyDescriptionAsync(array $args = [])
 * @method \Aws\Result updatePrimaryRegion(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updatePrimaryRegionAsync(array $args = [])
 * @method \Aws\Result verify(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise verifyAsync(array $args = [])
 * @method \Aws\Result verifyMac(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise verifyMacAsync(array $args = [])
 */
class KmsClient extends AwsClient {}
