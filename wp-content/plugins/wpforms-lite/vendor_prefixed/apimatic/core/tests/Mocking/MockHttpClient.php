<?php

namespace WPForms\Vendor\Core\Tests\Mocking;

use WPForms\Vendor\Core\Tests\Mocking\Response\MockResponse;
use WPForms\Vendor\CoreInterfaces\Core\Request\RequestInterface;
use WPForms\Vendor\CoreInterfaces\Core\Response\ResponseInterface;
use WPForms\Vendor\CoreInterfaces\Http\HttpClientInterface;
class MockHttpClient implements HttpClientInterface
{
    public function execute(RequestInterface $request) : ResponseInterface
    {
        return new MockResponse($request);
    }
}
