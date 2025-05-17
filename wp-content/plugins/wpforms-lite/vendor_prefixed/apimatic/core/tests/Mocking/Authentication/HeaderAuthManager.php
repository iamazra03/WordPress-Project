<?php

namespace WPForms\Vendor\Core\Tests\Mocking\Authentication;

use WPForms\Vendor\Core\Authentication\CoreAuth;
use WPForms\Vendor\Core\Request\Parameters\HeaderParam;
class HeaderAuthManager extends CoreAuth
{
    public function __construct($token, $accessToken)
    {
        parent::__construct(HeaderParam::init('token', $token)->requiredNonEmpty(), HeaderParam::init('authorization', $accessToken)->requiredNonEmpty());
    }
}
