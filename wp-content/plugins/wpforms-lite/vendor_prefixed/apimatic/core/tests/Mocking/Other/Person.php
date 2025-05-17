<?php

namespace WPForms\Vendor\Core\Tests\Mocking\Other;

use WPForms\Vendor\Core\Utils\CoreHelper;
class Person
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var array
     */
    public $additionalProperties;
    public function __toString() : string
    {
        return CoreHelper::stringify('Person', ['name' => $this->name, 'additionalProperties' => $this->additionalProperties]);
    }
}
