<?php


namespace App\Transformers;


use App\Support\Pagination as PaginationModel;
use Illuminate\Support\Collection;

class Pagination
{
    /**
     * @var array
     */
    private $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function transform(): PaginationModel
    {
        return new PaginationModel(count($this->data), $this->data);
    }
}
