<?php

namespace WPForms\Vendor\Square\Tests;

use WPForms\Vendor\Core\Types\CallbackCatcher;
use WPForms\Vendor\Square\Exceptions\ApiException;
use WPForms\Vendor\Square\Exceptions;
use WPForms\Vendor\Square\ApiHelper;
use WPForms\Vendor\Square\Apis\OrdersApi;
use WPForms\Vendor\Square\Apis\LocationsApi;
use WPForms\Vendor\Square\Models\CreateOrderResponse;
use WPForms\Vendor\Square\Models\SearchOrdersRequest;
use WPForms\Vendor\Square\Models\SearchOrdersResponse;
use WPForms\Vendor\Square\Models\SearchOrdersQuery;
use WPForms\Vendor\Square\Models\SearchOrdersFilter;
use WPForms\Vendor\Square\Models\UpdateOrderResponse;
use WPForms\Vendor\Square\Models\BatchRetrieveOrdersResponse;
use WPForms\Vendor\Square\Models\PayOrderResponse;
use WPForms\Vendor\Square\Models\OrderMoneyAmounts;
use WPForms\Vendor\Square\Models\Order;
use WPForms\Vendor\Square\Models\CreateOrderRequest;
use WPForms\Vendor\Square\Models\OrderState;
use WPForms\Vendor\Square\Models\Money;
use WPForms\Vendor\Square\Models\UpdateOrderRequest;
use WPForms\Vendor\Square\Models\SearchOrdersStateFilter;
use WPForms\Vendor\Square\Models\BatchRetrieveOrdersRequest;
use WPForms\Vendor\Square\Models\PayOrderRequest;
use WPForms\Vendor\Square\Models;
use WPForms\Vendor\PHPUnit\Framework\TestCase;
class OrdersTest extends TestCase
{
    /**
     * @var \Square\Apis\OrdersApi Controller instance
     */
    protected static $controller;
    /**
     * @var \Square\LocationsApi Controller instance
     */
    protected static $Locations;
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
        $client = ClientFactory::create(self::$httpResponse);
        self::$controller = $client->getOrdersApi();
        self::$Locations = $client->getLocationsApi();
    }
    public function testSearchOrders()
    {
        $locationsResult = self::$Locations->listLocations();
        $this->assertTrue($locationsResult->isSuccess());
        $locationId = $locationsResult->getResult()->getLocations()[0]->getId();
        $body = new SearchOrdersRequest();
        $body->setLocationIds([$locationId]);
        $body->setQuery(new SearchOrdersQuery());
        $body->getQuery()->setFilter(new SearchOrdersFilter());
        $body_query_filter_stateFilter_states = [OrderState::COMPLETED];
        $body->getQuery()->getFilter()->setStateFilter(new SearchOrdersStateFilter($body_query_filter_stateFilter_states));
        $body->setLimit(3);
        $body->setReturnEntries(\true);
        $apiResponse = self::$controller->searchOrders($body);
        $this->assertTrue($apiResponse->isSuccess());
        $this->assertTrue($apiResponse->getResult() instanceof SearchOrdersResponse);
    }
    public function testCreateOrder()
    {
        $locationsResult = self::$Locations->listLocations();
        $this->assertTrue($locationsResult->isSuccess());
        $locationId = $locationsResult->getResult()->getLocations()[0]->getId();
        $body_idempotencyKey = \uniqid();
        $order = new Order($locationId);
        $body = new CreateOrderRequest();
        $body->setIdempotencyKey($body_idempotencyKey);
        $body->setOrder($order);
        $apiResponse = self::$controller->createOrder($body);
        $this->assertTrue($apiResponse->isSuccess());
        $this->assertTrue($apiResponse->getResult() instanceof CreateOrderResponse);
        $this->assertTrue($apiResponse->getResult()->getOrder() instanceof Order);
        $this->assertEquals($apiResponse->getResult()->getOrder()->getLocationId(), $locationId);
        $orderId = $apiResponse->getResult()->getOrder()->getId();
        $version = $apiResponse->getResult()->getOrder()->getVersion();
        return array($orderId, $locationId, $version);
    }
    /**
     * @depends testCreateOrder
     */
    public function testUpdateOrder(array $orderLocationVersion)
    {
        $orderId = $orderLocationVersion[0];
        $locationId = $orderLocationVersion[1];
        $version = $orderLocationVersion[2];
        $order = new Order($locationId);
        $order->setVersion($version);
        $body = new UpdateOrderRequest();
        $body->setOrder($order);
        $apiResponse = self::$controller->updateOrder($orderId, $body);
        $this->assertTrue($apiResponse->isSuccess());
        $this->assertTrue($apiResponse->getResult() instanceof UpdateOrderResponse);
        $this->assertTrue($apiResponse->getResult()->getOrder() instanceof Order);
        $this->assertEquals($apiResponse->getResult()->getOrder()->getLocationId(), $locationId);
        $this->assertEquals($apiResponse->getResult()->getOrder()->getVersion(), $version + 1);
        return array($orderId, $locationId);
    }
    /**
     * @depends testUpdateOrder
     */
    public function testBatchRetrieveOrders(array $orderIdLocationId)
    {
        $orderId = $orderIdLocationId[0];
        $locationId = $orderIdLocationId[1];
        $body_orderIds = [$orderId];
        $body = new BatchRetrieveOrdersRequest($body_orderIds);
        $apiResponse = self::$controller->batchRetrieveOrders($body);
        $this->assertTrue($apiResponse->isSuccess());
        $this->assertTrue($apiResponse->getResult() instanceof BatchRetrieveOrdersResponse);
        $this->assertEquals($apiResponse->getResult()->getOrders()[0]->getLocationId(), $locationId);
        return $orderId;
    }
    /**
     * @depends testBatchRetrieveOrders
     */
    public function testPayOrder($orderId)
    {
        $body_idempotencyKey = \uniqid();
        $body = new PayOrderRequest($body_idempotencyKey);
        // Empty since dollar value is zero
        $body->setPaymentIds([]);
        $apiResponse = self::$controller->payOrder($orderId, $body);
        $this->assertTrue($apiResponse->isSuccess());
        $this->assertTrue($apiResponse->getResult() instanceof PayOrderResponse);
        $this->assertTrue($apiResponse->getResult()->getOrder() instanceof Order);
        $this->assertEquals($apiResponse->getResult()->getOrder()->getState(), OrderState::COMPLETED);
        $this->assertTrue($apiResponse->getResult()->getOrder()->getTotalMoney() instanceof Money);
        $this->assertEquals($apiResponse->getResult()->getOrder()->getTotalMoney()->getAmount(), 0);
    }
}
