<?php

namespace WPForms\Vendor\Square\Tests;

use WPForms\Vendor\Core\Types\CallbackCatcher;
use WPForms\Vendor\Square\APIException;
use WPForms\Vendor\Square\APIHelper;
use WPForms\Vendor\Square\Apis\MerchantsApi;
use WPForms\Vendor\Square\Exceptions;
use WPForms\Vendor\Square\Models\ListMerchantsResponse;
use WPForms\Vendor\Square\Models\Merchant;
use WPForms\Vendor\Square\Models\RetrieveMerchantResponse;
use WPForms\Vendor\PHPUnit\Framework\TestCase;
class MarchantsTest extends TestCase
{
    /**
     * @var \Square\Apis\MerchantsApi Controller instance
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
        self::$controller = ClientFactory::create(self::$httpResponse)->getMerchantsApi();
    }
    public function testListMerchants()
    {
        $apiResponse = self::$controller->listMerchants();
        $this->assertEquals($apiResponse->getStatusCode(), 200);
        $this->assertTrue($apiResponse->isSuccess());
        $this->assertFalse($apiResponse->isError());
        $this->assertTrue($apiResponse->getResult() instanceof ListMerchantsResponse);
        $this->assertIsArray($apiResponse->getResult()->getMerchant());
        return $apiResponse->getResult()->getMerchant()[0]->getId();
    }
    /**
     * @depends testListMerchants
     */
    public function testRetrieveMerchant($merchantId)
    {
        $apiResponse = self::$controller->retrieveMerchant($merchantId);
        $this->assertEquals($apiResponse->getStatusCode(), 200);
        $this->assertTrue($apiResponse->isSuccess());
        $this->assertFalse($apiResponse->isError());
        $this->assertTrue($apiResponse->getResult() instanceof RetrieveMerchantResponse);
        $this->assertTrue($apiResponse->getResult()->getMerchant() instanceof Merchant);
        $this->assertEquals($apiResponse->getResult()->getMerchant()->getId(), $merchantId);
    }
}
