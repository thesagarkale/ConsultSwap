<?php


namespace App\Support;


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

    public function __construct(
        int $total,
        int $perpage,
        int $page,
        array $params,
        $results
    ) {
        $this->total = $total;
        $this->perpage = $perpage;
        $this->page = $page;
        $this->results = $results;
        $this->params = $params;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getNext(): int
    {
        return $this->page + 1;
    }

    public function getPrevious(): int
    {
        if ($this->page > 1) {
            return $this->page - 1;
        }

        return $this->page;
    }

    public function getPages(): int
    {
        if ($this->total > 0) {
            return (int) ceil($this->total/ $this->perpage);
        }

        return 0;
    }

    public function getNextPageURI(): string
    {
        return http_build_query(array_merge($this->params, ['page' => $this->getNext()]));
    }

    public function getPreviousPageURI(): string
    {
        return http_build_query(array_merge($this->params, ['page' => $this->getPrevious()]));
    }

    public function getResults()
    {
        return $this->results;
    }

    public function getOffset(): int
    {
        return ($this->page - 1) * $this->perpage;
    }
}
