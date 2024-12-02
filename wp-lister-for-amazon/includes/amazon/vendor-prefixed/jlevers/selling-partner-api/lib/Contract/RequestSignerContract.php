<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by __root__ on 08-May-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace WPLab\Amazon\SellingPartnerApi\Contract;

use WPLab\Amazon\Psr\Http\Message\RequestInterface;

interface RequestSignerContract
{
    public function signRequest(
        RequestInterface $request,
        ?string $scope = null,
        ?string $restrictedPath = null,
        ?string $operation = null
    ): RequestInterface;
}