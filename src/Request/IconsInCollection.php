<?php namespace MattyRad\NounProject\Request;

use MattyRad\NounProject;
use MattyRad\Support;

class IconsInCollection extends NounProject\Request
{
    private $collection_id_or_slug;
    private $offset;
    private $page;
    private $limit;

    public function __construct(
        $collection_id_or_slug,
        int $offset = 0,
        int $page = 0,
        int $limit = 0
    ) {
        $this->collection_id_or_slug = $collection_id_or_slug;
        $this->offset = $offset;
        $this->page = $page;
        $this->limit = $limit;
    }

    // FIXME: this could get cleaned up
    public function getUri(): string
    {
        $uri = '/collection/' . $this->collection_id_or_slug . '/icons?';

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
