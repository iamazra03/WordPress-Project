<?php

namespace WPForms\Vendor\Unirest\Test\Mocking;

use WPForms\Vendor\Unirest\HttpClient;
class HttpClientChild extends HttpClient
{
    public function getTotalNumberOfConnections()
    {
        return $this->totalNumberOfConnections;
    }
    public function resetHandle()
    {
        $this->initializeHandle();
    }
}
