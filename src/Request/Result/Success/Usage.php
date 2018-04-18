<?php namespace MattyRad\NounProject\Request\Result\Success;

use MattyRad\Support;

class Usage extends Support\Result\Success
{
    private $usage;
    private $limits;

    public function __construct(array $usage, array $limits)
    {
        $this->usage = $usage;
        $this->limits = $limits;
    }

    public function getUsage(): array
    {
        return $this->usage;
    }

    public function getLimits(): array
    {
        return $this->limits;
    }
}
