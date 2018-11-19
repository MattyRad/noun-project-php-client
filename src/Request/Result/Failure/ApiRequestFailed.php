<?php namespace MattyRad\NounProject\Request\Result\Failure;

use MattyRad\Support;

class ApiRequestFailed extends Support\Result\Failure
{
    protected static $message = 'Http request to NounProject API failed';

    private $error_description;

    public function __construct(string $error_description)
    {
        $this->error_description = $error_description;
    }

    public function getContext(): array
    {
        return [
            'error' => $this->error_description,
        ];
    }
}
