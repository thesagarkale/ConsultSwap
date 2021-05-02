<?php


namespace App\Support;


class Pagination
{
    /**
     * @var array
     */
    private $data;
    /**
     * @var int
     */
    private $total;
    /**
     * @var array
     */
    private $results;

    public function __construct(int $total, object $results)
    {
        $this->total = $total;
        $this->results = $results;
    }

    public function getResults()
    {
        return $this->results;
    }
}
