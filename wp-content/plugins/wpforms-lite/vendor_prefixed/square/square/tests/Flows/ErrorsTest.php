<?php

namespace WPForms\Vendor\Square\Tests;

use WPForms\Vendor\Square\SquareClient;
use WPForms\Vendor\Square\APIException;
use WPForms\Vendor\Square\Exceptions;
use WPForms\Vendor\Square\APIHelper;
use WPForms\Vendor\Square\Models;
use WPForms\Vendor\PHPUnit\Framework\TestCase;
class ErrorsTest extends TestCase
{
    public function testV2Error()
    {
        $client = new SquareClient(['environment' => \WPForms\Vendor\Square\Environment::SANDBOX, 'accessToken' => 'BAD_TOKEN']);
        $response = $client->getLocationsApi()->listLocations();
        $this->assertEquals(401, $response->getStatusCode());
        $this->assertEquals(1, \count($response->getErrors()));
        $this->assertEquals("AUTHENTICATION_ERROR", $response->getErrors()[0]->getCategory());
        $this->assertEquals("UNAUTHORIZED", $response->getErrors()[0]->getCode());
    }
}
