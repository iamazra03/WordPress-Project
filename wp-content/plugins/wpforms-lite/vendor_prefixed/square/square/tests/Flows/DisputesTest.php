<?php

namespace WPForms\Vendor\Square\Tests;

use WPForms\Vendor\Core\Types\CallbackCatcher;
use WPForms\Vendor\Square\APIException;
use WPForms\Vendor\Square\APIHelper;
use WPForms\Vendor\Square\Exceptions;
use WPForms\Vendor\Square\Apis\DisputesApi;
use WPForms\Vendor\Square\Utils\FileWrapper;
use WPForms\Vendor\Square\Models\ListDisputesResponse;
use WPForms\Vendor\PHPUnit\Framework\TestCase;
class DisputesTest extends TestCase
{
    /**
     * @var \Square\Apis\DisputesApi Controller instance
     */
    protected static $controller;
    /**
     * @var CallbackCatcher Callback
     */
    protected static $httpResponse;
    /**
     * Setup test class
     */
    public static function setUpBeforeClass() : void
    {
        self::$httpResponse = new CallbackCatcher();
        self::$controller = ClientFactory::create(self::$httpResponse)->getDisputesApi();
    }
    public function testListDisputes()
    {
        $apiResponse = self::$controller->listDisputes();
        $this->assertTrue($apiResponse->isSuccess());
        $this->assertTrue($apiResponse->getResult() instanceof ListDisputesResponse);
    }
}
