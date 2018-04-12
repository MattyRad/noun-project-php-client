<?php namespace MattyRad\NounProject;

use MattyRad\NounProject\Request;
use MattyRad\Support;

abstract class Request
{
    abstract public function getUri(): string; // /icon, etc

    abstract public function createResult(array $response_data): Support\Result;

    abstract public function getHttpType(): string
    {
        return 'GET';
    }
}
