<?php

declare (strict_types=1);
namespace WPForms\Vendor\Core\Tests\Mocking\Types;

use WPForms\Vendor\Core\Types\Sdk\CoreContext;
class MockContext extends CoreContext
{
    public function getRequest() : MockRequest
    {
        return $this->request;
    }
    public function getResponse() : MockCoreResponse
    {
        return $this->response;
    }
}
