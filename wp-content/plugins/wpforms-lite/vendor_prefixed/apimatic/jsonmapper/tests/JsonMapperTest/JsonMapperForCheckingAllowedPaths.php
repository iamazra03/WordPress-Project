<?php

namespace WPForms\Vendor;

use WPForms\Vendor\apimatic\jsonmapper\JsonMapper;
class JsonMapperForCheckingAllowedPaths extends JsonMapper
{
    function isPathAllowed($filePath, $allowedPaths)
    {
        return parent::isPathAllowed($filePath, $allowedPaths);
    }
}
