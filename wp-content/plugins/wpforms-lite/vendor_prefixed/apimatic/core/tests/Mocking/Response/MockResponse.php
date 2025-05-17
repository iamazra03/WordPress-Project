<?php

namespace WPForms\Vendor\Core\Tests\Mocking\Response;

use WPForms\Vendor\Core\Tests\Mocking\Other\MockClass;
use WPForms\Vendor\Core\Utils\CoreHelper;
use WPForms\Vendor\CoreInterfaces\Core\Request\RequestInterface;
use WPForms\Vendor\CoreInterfaces\Core\Response\ResponseInterface;
use WPForms\Vendor\CoreInterfaces\Sdk\ConverterInterface;
class MockResponse implements ResponseInterface
{
    private $body;
    private $rawBody;
    private $statusCode = 200;
    private $headers = [];
    public function __construct(?RequestInterface $request = null)
    {
        if (\is_null($request)) {
            return;
        }
        $this->body = (object) (array) new MockClass(['httpMethod' => $request->getHttpMethod(), 'queryUrl' => $request->getQueryUrl(), 'headers' => $request->getHeaders(), 'parameters' => $request->getParameters(), 'parametersEncoded' => $request->getEncodedParameters(), 'parametersMultipart' => $request->getMultipartParameters(), 'body' => $request->getBody(), 'retryOption' => $request->getRetryOption()]);
        $this->rawBody = CoreHelper::serialize($this->body);
        $this->headers = ['content-type' => 'application/json'];
    }
    public function setStatusCode(int $statusCode) : void
    {
        $this->statusCode = $statusCode;
    }
    public function getStatusCode() : int
    {
        return $this->statusCode;
    }
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }
    public function getHeaders() : array
    {
        return $this->headers;
    }
    public function setRawBody($rawBody) : void
    {
        $this->rawBody = $rawBody;
    }
    public function getRawBody() : string
    {
        return $this->rawBody ?? '{"res":"This is raw body"}';
    }
    public function setBody($body) : void
    {
        $this->body = \is_object($body) || \is_array($body) ? (object) (array) $body : $body;
        $this->rawBody = CoreHelper::serialize($body);
    }
    public function getBody()
    {
        return $this->body;
    }
    public function convert(ConverterInterface $converter)
    {
        return $converter->createHttpResponse($this);
    }
}
