<?php

namespace App\Support;

use App\Transformers\TransformerInterface;

class Pagination
{
    /**
     * @var int
     */
    private $total;

    /**
     * @var array
     */
    private $results;

    /**
     * @var int
     */
    private $perpage;

    /**
     * @var int
     */
    private $page;

    /**
     * @var array
     */
    private $params;

    /**
     * @var string|null
     */
    private $transformer;

    public function __construct(
        int $total,
        int $perpage,
        int $page,
        array $params,
        $results,
        ?TransformerInterface $transformer = null
    ) {
        $this->total = $total;
        $this->perpage = $perpage;
        $this->page = $page;
        $this->results = $results;
        $this->params = $params;
        $this->transformer = $transformer;
    }

    /**
     * Gets the total available
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * Get the current page
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * Get the next page
     * @return int
     */
    public function getNext(): int
    {
        return $this->page + 1;
    }

    /**
     * Get the previous page
     * @return int
     */
    public function getPrevious(): int
    {
        if ($this->page > 1) {
            return $this->page - 1;
        }

        return $this->page;
    }

    /**
     * Get the total number of pages
     * @return int
     */
    public function getPages(): int
    {
        if ($this->total > 0) {
            return (int) ceil($this->total/ $this->perpage);
        }

        return 0;
    }

    /**
     * Gets the next page URI, preserving query
     * @return string
     */
    public function getNextPageURI(): string
    {
        return http_build_query(array_merge($this->params, ['page' => $this->getNext()]));
    }

    /**
     * Gets the previous page URI, preserving query
     * @return string
     */
    public function getPreviousPageURI(): string
    {
        return http_build_query(array_merge($this->params, ['page' => $this->getPrevious()]));
    }

    /**
     * Gets the
     * @return array
     */
    public function getResults()
    {
        return $this->results;
    }

    public function getOffset(): int
    {
        return ($this->page - 1) * $this->perpage;
    }

    public function toArray(): array
    {
        return [
            'data' => !is_null($this->transformer) ? $this->transformer::transformArray($this->getResults()) : $this->getResults(),
            'links' => [
                'nextPageURI' => $this->getNextPageURI(),
                'previousPageURI' => $this->getPreviousPageURI(),
            ],
            'meta' => [
                'next' => $this->getNext(),
                'previous' => $this->getPrevious(),
                'page' => $this->getPage(),
                'pages' => $this->getPages(),
                'total' => $this->getTotal(),
            ]
        ];
    }
}
