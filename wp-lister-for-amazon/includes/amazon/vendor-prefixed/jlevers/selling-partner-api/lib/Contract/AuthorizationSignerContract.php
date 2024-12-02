<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by __root__ on 08-May-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace WPLab\Amazon\SellingPartnerApi\Contract;

use DateTime;
use WPLab\Amazon\Psr\Http\Message\RequestInterface;
use WPLab\Amazon\SellingPartnerApi\Credentials;

interface AuthorizationSignerContract
{
    public function sign(RequestInterface $request, Credentials $credentials): RequestInterface;

    public function setRequestTime(?DateTime $datetime = null): void;

    public function formattedRequestTime(?bool $withTime = true): ?string;
}