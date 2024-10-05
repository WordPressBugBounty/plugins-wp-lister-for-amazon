<?php
/**
 * ListingsRestrictionsV20210801Api
 * PHP version 7.3
 *
 * @category Class
 * @package  SellingPartnerApi
 */

/**
 * Selling Partner API for Listings Restrictions
 *
 * The Selling Partner API for Listings Restrictions provides programmatic access to restrictions on Amazon catalog listings. For more information, see the [Listings Restrictions API Use Case Guide](https://developer-docs.amazon.com/sp-api/docs/listings-restrictions-api-v2021-08-01-use-case-guide).
 *
 * The version of the OpenAPI document: 2021-08-01
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace SellingPartnerApi\Api;

use WPLab\GuzzeHttp\Client;
use WPLab\GuzzeHttp\ClientInterface;
use WPLab\GuzzeHttp\Exception\RequestException;
use WPLab\GuzzeHttp\Psr7\MultipartStream;
use WPLab\GuzzeHttp\Psr7\Request;
use WPLab\GuzzeHttp\RequestOptions;
use SellingPartnerApi\ApiException;
use SellingPartnerApi\Configuration;
use SellingPartnerApi\HeaderSelector;
use SellingPartnerApi\ObjectSerializer;

/**
 * ListingsRestrictionsV20210801Api Class Doc Comment
 *
 * @category Class
 * @package  SellingPartnerApi
 */
class ListingsRestrictionsV20210801Api
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param Configuration   $config
     * @param ClientInterface $client
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        Configuration $config,
        ClientInterface $client = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config;
        $this->headerSelector = $selector ?: new HeaderSelector($this->config);
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex)
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getListingsRestrictions
     *
     * @param  string $asin The Amazon Standard Identification Number (ASIN) of the item. (required)
     * @param  string $seller_id A selling partner identifier, such as a merchant account. (required)
     * @param  string[] $marketplace_ids A comma-delimited list of Amazon marketplace identifiers for the request. (required)
     * @param  string $condition_type The condition used to filter restrictions. (optional)
     * @param  string $reason_locale A locale for reason text localization. When not provided, the default language code of the first marketplace is used. Examples: \&quot;en_US\&quot;, \&quot;fr_CA\&quot;, \&quot;fr_FR\&quot;. Localized messages default to \&quot;en_US\&quot; when a localization is not available in the specified locale. (optional)
     *
     * @throws \SellingPartnerApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SellingPartnerApi\Model\ListingsRestrictionsV20210801\RestrictionList
     */
    public function getListingsRestrictions($asin, $seller_id, $marketplace_ids, $condition_type = null, $reason_locale = null)
    {
        $response = $this->getListingsRestrictionsWithHttpInfo($asin, $seller_id, $marketplace_ids, $condition_type, $reason_locale);
        return $response;
    }

    /**
     * Operation getListingsRestrictionsWithHttpInfo
     *
     * @param  string $asin The Amazon Standard Identification Number (ASIN) of the item. (required)
     * @param  string $seller_id A selling partner identifier, such as a merchant account. (required)
     * @param  string[] $marketplace_ids A comma-delimited list of Amazon marketplace identifiers for the request. (required)
     * @param  string $condition_type The condition used to filter restrictions. (optional)
     * @param  string $reason_locale A locale for reason text localization. When not provided, the default language code of the first marketplace is used. Examples: \&quot;en_US\&quot;, \&quot;fr_CA\&quot;, \&quot;fr_FR\&quot;. Localized messages default to \&quot;en_US\&quot; when a localization is not available in the specified locale. (optional)
     *
     * @throws \SellingPartnerApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SellingPartnerApi\Model\ListingsRestrictionsV20210801\RestrictionList, HTTP status code, HTTP response headers (array of strings)
     */
    public function getListingsRestrictionsWithHttpInfo($asin, $seller_id, $marketplace_ids, $condition_type = null, $reason_locale = null)
    {
        $request = $this->getListingsRestrictionsRequest($asin, $seller_id, $marketplace_ids, $condition_type, $reason_locale);
        $signedRequest = $this->config->signRequest(
            $request
        );

        $this->writeDebug($signedRequest);
        $this->writeDebug((string) $signedRequest->getBody());

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($signedRequest, $options);
                $this->writeDebug($response);
                $this->writeDebug((string) $response->getBody());
            } catch (RequestException $e) {
                $hasResponse = !empty($e->hasResponse());
                $body = (string) ($hasResponse ? $e->getResponse()->getBody() : '[NULL response]');
                $this->writeDebug($e->getResponse());
                $this->writeDebug($body);
                throw new ApiException(
                    "[{$e->getCode()}] {$body}",
                    $e->getCode(),
                    $hasResponse ? $e->getResponse()->getHeaders() : [],
                    $body
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $signedRequest->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()->getContents()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\SellingPartnerApi\Model\ListingsRestrictionsV20210801\RestrictionList' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\RestrictionList', $response->getHeaders());
                case 400:
                    if ('\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]', $response->getHeaders());
                case 403:
                    if ('\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]', $response->getHeaders());
                case 404:
                    if ('\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]', $response->getHeaders());
                case 413:
                    if ('\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]', $response->getHeaders());
                case 415:
                    if ('\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]', $response->getHeaders());
                case 429:
                    if ('\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]', $response->getHeaders());
                case 500:
                    if ('\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]', $response->getHeaders());
                case 503:
                    if ('\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]', $response->getHeaders());
            }

            $returnType = '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\RestrictionList';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = (string) $responseBody;
            }

            return ObjectSerializer::deserialize($content, $returnType, $response->getHeaders());

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\RestrictionList',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 413:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 415:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\Error[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            $this->writeDebug($e);
            throw $e;
        }
    }

    /**
     * Operation getListingsRestrictionsAsync
     *
     * 
     *
     * @param  string $asin The Amazon Standard Identification Number (ASIN) of the item. (required)
     * @param  string $seller_id A selling partner identifier, such as a merchant account. (required)
     * @param  string[] $marketplace_ids A comma-delimited list of Amazon marketplace identifiers for the request. (required)
     * @param  string $condition_type The condition used to filter restrictions. (optional)
     * @param  string $reason_locale A locale for reason text localization. When not provided, the default language code of the first marketplace is used. Examples: \&quot;en_US\&quot;, \&quot;fr_CA\&quot;, \&quot;fr_FR\&quot;. Localized messages default to \&quot;en_US\&quot; when a localization is not available in the specified locale. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \WPLab\GuzzeHttp\Promise\PromiseInterface
     */
    public function getListingsRestrictionsAsync($asin, $seller_id, $marketplace_ids, $condition_type = null, $reason_locale = null)
    {
        return $this->getListingsRestrictionsAsyncWithHttpInfo($asin, $seller_id, $marketplace_ids, $condition_type, $reason_locale);;
    }

    /**
     * Operation getListingsRestrictionsAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $asin The Amazon Standard Identification Number (ASIN) of the item. (required)
     * @param  string $seller_id A selling partner identifier, such as a merchant account. (required)
     * @param  string[] $marketplace_ids A comma-delimited list of Amazon marketplace identifiers for the request. (required)
     * @param  string $condition_type The condition used to filter restrictions. (optional)
     * @param  string $reason_locale A locale for reason text localization. When not provided, the default language code of the first marketplace is used. Examples: \&quot;en_US\&quot;, \&quot;fr_CA\&quot;, \&quot;fr_FR\&quot;. Localized messages default to \&quot;en_US\&quot; when a localization is not available in the specified locale. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \WPLab\GuzzeHttp\Promise\PromiseInterface
     */
    public function getListingsRestrictionsAsyncWithHttpInfo($asin, $seller_id, $marketplace_ids, $condition_type = null, $reason_locale = null)
    {
        $returnType = '\SellingPartnerApi\Model\ListingsRestrictionsV20210801\RestrictionList';
        $request = $this->getListingsRestrictionsRequest($asin, $seller_id, $marketplace_ids, $condition_type, $reason_locale);
        $signedRequest = $this->config->signRequest(
            $request
        );

        $this->writeDebug($signedRequest);
        $this->writeDebug((string) $signedRequest->getBody());

        return $this->client
            ->sendAsync($signedRequest, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $this->writeDebug($response);
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return ObjectSerializer::deserialize($content, $returnType, $response->getHeaders());
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $hasResponse = !empty($response);
                    $body = (string) ($hasResponse ? $response->getBody() : '[NULL response]');
                    $this->writeDebug($response);
                    $statusCode = $hasResponse ? $response->getStatusCode() : $exception->getCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $hasResponse ? $response->getHeaders() : [],
                        $body
                    );
                }
            );
    }

    /**
     * Create request for operation 'getListingsRestrictions'
     *
     * @param  string $asin The Amazon Standard Identification Number (ASIN) of the item. (required)
     * @param  string $seller_id A selling partner identifier, such as a merchant account. (required)
     * @param  string[] $marketplace_ids A comma-delimited list of Amazon marketplace identifiers for the request. (required)
     * @param  string $condition_type The condition used to filter restrictions. (optional)
     * @param  string $reason_locale A locale for reason text localization. When not provided, the default language code of the first marketplace is used. Examples: \&quot;en_US\&quot;, \&quot;fr_CA\&quot;, \&quot;fr_FR\&quot;. Localized messages default to \&quot;en_US\&quot; when a localization is not available in the specified locale. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \WPLab\GuzzeHttp\Psr7\Request
     */
    public function getListingsRestrictionsRequest($asin, $seller_id, $marketplace_ids, $condition_type = null, $reason_locale = null)
    {
        // verify the required parameter 'asin' is set
        if ($asin === null || (is_array($asin) && count($asin) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $asin when calling getListingsRestrictions'
            );
        }
        // verify the required parameter 'seller_id' is set
        if ($seller_id === null || (is_array($seller_id) && count($seller_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $seller_id when calling getListingsRestrictions'
            );
        }
        // verify the required parameter 'marketplace_ids' is set
        if ($marketplace_ids === null || (is_array($marketplace_ids) && count($marketplace_ids) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $marketplace_ids when calling getListingsRestrictions'
            );
        }

        $resourcePath = '/listings/2021-08-01/restrictions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (is_array($asin)) {
            $asin = ObjectSerializer::serializeCollection($asin, '', true);
        }
        if ($asin !== null) {
            $queryParams['asin'] = $asin;
        }

        // query params
        if (is_array($condition_type)) {
            $condition_type = ObjectSerializer::serializeCollection($condition_type, '', true);
        }
        if ($condition_type !== null) {
            $queryParams['conditionType'] = $condition_type;
        }

        // query params
        if (is_array($seller_id)) {
            $seller_id = ObjectSerializer::serializeCollection($seller_id, '', true);
        }
        if ($seller_id !== null) {
            $queryParams['sellerId'] = $seller_id;
        }

        // query params
        if (is_array($marketplace_ids)) {
            $marketplace_ids = ObjectSerializer::serializeCollection($marketplace_ids, 'form', true);
        }
        if ($marketplace_ids !== null) {
            $queryParams['marketplaceIds'] = $marketplace_ids;
        }

        // query params
        if (is_array($reason_locale)) {
            $reason_locale = ObjectSerializer::serializeCollection($reason_locale, '', true);
        }
        if ($reason_locale !== null) {
            $queryParams['reasonLocale'] = $reason_locale;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \WPLab\GuzzeHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \WPLab\GuzzeHttp\Psr7\Query::build($formParams);
            }
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \WPLab\GuzzeHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }

    /**
     * Writes to the debug log file
     *
     * @param any $data
     * @return void
     */
    private function writeDebug($data)
    {
        if ($this->config->getDebug()) {
            file_put_contents($this->config->getDebugFile(), '[' . date('Y-m-d H:i:s') . ']: ' . print_r($data, true) . "\n", FILE_APPEND);
        }
    }
}
