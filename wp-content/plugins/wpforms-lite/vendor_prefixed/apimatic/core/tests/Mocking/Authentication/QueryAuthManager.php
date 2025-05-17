<?php

namespace WPForms\Vendor\Core\Tests\Mocking\Authentication;

use WPForms\Vendor\Core\Authentication\CoreAuth;
use WPForms\Vendor\Core\Request\Parameters\QueryParam;
class QueryAuthManager extends CoreAuth
{
    public function __construct($token, $accessToken)
    {
        parent::__construct(QueryParam::init('token', $token)->requiredNonEmpty(), QueryParam::init('authorization', $accessToken)->requiredNonEmpty());
    }
}
