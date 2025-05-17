<?php

declare (strict_types=1);
namespace WPForms\Vendor\Core\Tests\Mocking\Types;

use WPForms\Vendor\Core\Types\Sdk\CoreFileWrapper;
use WPForms\Vendor\Core\Utils\CoreHelper;
class MockFileWrapper extends CoreFileWrapper
{
    public static function createFromPath(string $realFilePath, ?string $mimeType = null, ?string $filename = '') : self
    {
        return new self($realFilePath, $mimeType, $filename);
    }
    /**
     * Converts the MockFileWrapper object to a human-readable string representation.
     *
     * @return string The string representation of the MockFileWrapper object.
     */
    public function __toString() : string
    {
        return CoreHelper::stringify('MockFileWrapper', [], parent::__toString());
    }
}
