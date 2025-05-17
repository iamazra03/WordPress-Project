<?php

declare (strict_types=1);
namespace WPForms\Vendor\Square\Tests\Apis;

use WPForms\Vendor\Core\TestCase\CoreTestCase;
use WPForms\Vendor\Core\Types\CallbackCatcher;
use WPForms\Vendor\PHPUnit\Framework\TestCase;
use WPForms\Vendor\Square\SquareClient;
use WPForms\Vendor\Square\Tests\ClientFactory;
class BaseTestController extends TestCase
{
    /**
     * @var CallbackCatcher Callback
     */
    protected static $callbackCatcher;
    protected function newTestCase($result) : CoreTestCase
    {
        return new CoreTestCase($this, self::$callbackCatcher, $result);
    }
    protected static function getClient() : SquareClient
    {
        self::$callbackCatcher = new CallbackCatcher();
        return ClientFactory::create(self::$callbackCatcher);
    }
}
