<?php

namespace WPForms\Vendor\Core\Tests\Mocking\Logger;

class MockPrinter
{
    /**
     * @var string[]
     */
    public $args;
    public function printMessage(string ...$args)
    {
        $this->args = $args;
    }
}
