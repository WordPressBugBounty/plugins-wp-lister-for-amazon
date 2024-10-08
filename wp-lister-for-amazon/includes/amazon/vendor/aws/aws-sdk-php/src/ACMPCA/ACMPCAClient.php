<?php
namespace Aws\ACMPCA;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Certificate Manager Private Certificate Authority** service.
 * @method \Aws\Result createCertificateAuthority(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createCertificateAuthorityAsync(array $args = [])
 * @method \Aws\Result createCertificateAuthorityAuditReport(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createCertificateAuthorityAuditReportAsync(array $args = [])
 * @method \Aws\Result createPermission(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise createPermissionAsync(array $args = [])
 * @method \Aws\Result deleteCertificateAuthority(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deleteCertificateAuthorityAsync(array $args = [])
 * @method \Aws\Result deletePermission(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deletePermissionAsync(array $args = [])
 * @method \Aws\Result deletePolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @method \Aws\Result describeCertificateAuthority(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeCertificateAuthorityAsync(array $args = [])
 * @method \Aws\Result describeCertificateAuthorityAuditReport(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise describeCertificateAuthorityAuditReportAsync(array $args = [])
 * @method \Aws\Result getCertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getCertificateAsync(array $args = [])
 * @method \Aws\Result getCertificateAuthorityCertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getCertificateAuthorityCertificateAsync(array $args = [])
 * @method \Aws\Result getCertificateAuthorityCsr(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getCertificateAuthorityCsrAsync(array $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @method \Aws\Result importCertificateAuthorityCertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise importCertificateAuthorityCertificateAsync(array $args = [])
 * @method \Aws\Result issueCertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise issueCertificateAsync(array $args = [])
 * @method \Aws\Result listCertificateAuthorities(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listCertificateAuthoritiesAsync(array $args = [])
 * @method \Aws\Result listPermissions(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listPermissionsAsync(array $args = [])
 * @method \Aws\Result listTags(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise listTagsAsync(array $args = [])
 * @method \Aws\Result putPolicy(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise putPolicyAsync(array $args = [])
 * @method \Aws\Result restoreCertificateAuthority(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise restoreCertificateAuthorityAsync(array $args = [])
 * @method \Aws\Result revokeCertificate(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise revokeCertificateAsync(array $args = [])
 * @method \Aws\Result tagCertificateAuthority(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise tagCertificateAuthorityAsync(array $args = [])
 * @method \Aws\Result untagCertificateAuthority(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise untagCertificateAuthorityAsync(array $args = [])
 * @method \Aws\Result updateCertificateAuthority(array $args = [])
 * @method \WPLab\GuzzeHttp\Promise\Promise updateCertificateAuthorityAsync(array $args = [])
 */
class ACMPCAClient extends AwsClient {}
