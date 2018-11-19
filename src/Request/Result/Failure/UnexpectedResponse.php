<?php namespace MattyRad\NounProject\Request\Result\Failure;

use MattyRad\Support;

class UnexpectedResponse extends Support\Result\Failure
{
    protected static $message = 'NounProject API response did not contain expected data';

    private $missing_key;
    private $response_data;

    public function __construct(string $missing_key, array $response_data)
    {
        $this->missing_key = $missing_key;
        $this->response_data = $response_data;
    }

    public function getContext(): array
    {
        return [
            'missing_key' => $this->missing_key,
            'response_data' => $this->response_data,
        ];
    }
}
