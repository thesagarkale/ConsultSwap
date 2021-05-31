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

    public function __construct(
        int $total,
        int $perpage,
        int $page,
        $results
    ) {
        $this->total = $total;
        $this->perpage = $perpage;
        $this->page = $page;
        $this->results = $results;
    }



    public function getResults()
    {
        return $this->results;
    }
}
