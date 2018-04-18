<?php namespace MattyRad\NounProject\Request;

use MattyRad\NounProject;
use MattyRad\Support;

class Icons extends NounProject\Request
{
    private $term;
    private $offset;
    private $page;
    private $limit;
    private $limit_to_public_domain;

    public function __construct(
        string $term,
        bool $limit_to_public_domain = false,
        int $offset = 0,
        int $page = 0,
        int $limit = 0
    ) {
        $this->term = $term;
        $this->limit_to_public_domain = $limit_to_public_domain;
        $this->offset = $offset;
        $this->page = $page;
        $this->limit = $limit;
    }

    // FIXME: this could get cleaned up
    public function getUri(): string
    {
        $uri = '/icons/' . $this->term . '?';

        if ($this->limit_to_public_domain) {
            $uri .= 'limit_to_public_domain=' . urlencode($this->limit_to_public_domain) . '&';
        }

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
        if (! array_key_exists('icons', $response_data)) {
            return new Result\Failure\UnexpectedResponse('icons', $response_data);
        }

        return new Result\Success\Icons($response_data['icons']);
    }
}
