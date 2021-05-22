<?php


namespace App\Services;


use App\Models\Answer;
use App\Support\Pagination as PaginationModel;
use App\Transformers\Pagination as PaginationTransformer;
use Illuminate\Database\Eloquent\Model;

class Answers
{
    public function search(array $params): PaginationModel
    {
        $query = Answer::query();

        if ($params['question_id'] ?? false) {
            $query->where('question_id', '=', $params['question_id']);
        }

        $results = $query->get();

        return (new PaginationTransformer($results))->transform();
    }

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model
    {
        return Answer::query()->where('id', '=', $id)->firstOrFail();
    }
}
