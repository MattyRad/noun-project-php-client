<?php namespace MattyRad\NounProject\Request;

use MattyRad\NounProject;
use MattyRad\Support;

class Usage extends NounProject\Request
{
    public function getUri(): string
    {
        return '/oauth/usage';
    }

    public function createResult(array $response_data): Support\Result
    {
        return new Result\Success\Usage($response_data['limits'], $response_data['usage']);
    }
}
