<?php

declare(strict_types=1);

namespace Phpro\HttpTools\Sdk\Rest;

use Phpro\HttpTools\Request\Request;
use Phpro\HttpTools\Request\RequestInterface;
use Phpro\HttpTools\Transport\TransportInterface;

/**
 * @template ResponseType
 */
trait FindTrait
{
    abstract protected function transport(): TransportInterface;

    abstract protected function path(): string;

    /**
     * @return ResponseType
     */
    public function find(string $identifier)
    {
        /** @var RequestInterface<array|null> $request */
        $request = new Request('GET', $this->path().'/'.$identifier, [], null);

        return $this->transport()($request);
    }
}
