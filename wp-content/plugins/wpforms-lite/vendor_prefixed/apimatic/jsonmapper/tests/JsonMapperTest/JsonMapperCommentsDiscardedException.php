<?php

namespace WPForms\Vendor;

use WPForms\Vendor\apimatic\jsonmapper\JsonMapperException;
use WPForms\Vendor\apimatic\jsonmapper\JsonMapper;
class JsonMapperCommentsDiscardedException extends JsonMapper
{
    /**
     * @throws JsonMapperException
     */
    function __construct($config)
    {
        $this->config = $config;
        $this->zendOptimizerPlusExtensionLoaded = \true;
        parent::__construct();
    }
}
