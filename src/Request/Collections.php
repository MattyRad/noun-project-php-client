<?php namespace MattyRad\NounProject\Request;

use MattyRad\NounProject;
use MattyRad\Support;

class Collections extends NounProject\Request
{
    private $offset;
    private $page;
    private $limit;

    public function __construct(
        int $offset = 0,
        int $page = 0,
        int $limit = 0
    ) {
        $this->offset = $offset;
        $this->page = $page;
        $this->limit = $limit;
    }

    // FIXME: this could get cleaned up
    public function getUri(): string
    {
        $uri = '/collections?';

        if ($this->offset) {
            $uri .= 'offset=' . urlencode($this->offset) . '&';
        }

        if ($this->page) {
            $uri .= 'page=' . urlencode($this->page) . '&';
        }

        if ($this->limit) {
            $uri .= 'limit=' . urlencode($this->limit) . '&';
        }

        return trim($uri, '&');
    }

    public function createResult(array $response_data): Support\Result
    {
        if (! array_key_exists('collections', $response_data)) {
            return new Result\Failure\UnexpectedResponse('collections', $response_data);
        }

        return new Result\Success\Icons($response_data['collections']);
    }
}
