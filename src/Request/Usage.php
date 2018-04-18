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
        if (! array_key_exists('usage', $response_data)) {
            return new Result\Failure\UnexpectedResponse('usage', $response_data);
        }

        if (! array_key_exists('limits', $response_data)) {
            return new Result\Failure\UnexpectedResponse('limits', $response_data);
        }

        return new Result\Success\Usage($response_data['usage'], $response_data['limits']);
    }
}
