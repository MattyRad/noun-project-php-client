<?php namespace MattyRad\NounProject;

use MattyRad\NounProject\Request;
use MattyRad\Support;

abstract class Request
{
    abstract public function getHttpType(): string; // GET, POST, etc
    abstract public function getUri(): string; // /icon, etc
    abstract public function createResult($response_data): Support\Result;
}
