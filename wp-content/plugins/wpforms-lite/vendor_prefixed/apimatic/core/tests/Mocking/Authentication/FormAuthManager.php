<?php

namespace WPForms\Vendor\Core\Tests\Mocking\Authentication;

use WPForms\Vendor\Core\Authentication\CoreAuth;
use WPForms\Vendor\Core\Request\Parameters\FormParam;
class FormAuthManager extends CoreAuth
{
    public function __construct($token, $accessToken)
    {
        parent::__construct(FormParam::init('token', $token)->requiredNonEmpty(), FormParam::init('authorization', $accessToken)->requiredNonEmpty());
    }
}
