<?php

namespace App\Services;

use App\Models\Answer;
use App\Support\Pagination;
use App\Transformers\AnswersTransformer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Answers
{
    /**
     * Index search for Answers
     * @param array $params
     * @return Pagination
     */
    public function search(array $params): Pagination
    {
        $defaults = [
            'perpage' => 10,
            'page' => 1,
            'sort_by' => 'created_at',
            'sort_mode' => 'desc',
        ];

        $params = array_merge($params, $defaults);

        $query = $this->getQueryFromParams($params, Answer::query());

        $total = $query->count();

        $offset = ($params['page'] - 1) * $params['perpage'];

        $query->offset($offset)->limit($params['perpage']);

        $results = $query->get();

        return new Pagination($total, $params['perpage'], $params['page'], $params, $results->all(), new AnswersTransformer());
    }

    /**
     * Find answer
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model
    {
        return Answer::query()->where('id', '=', $id)->firstOrFail();
    }

    /**
     * Create the query builder using the params passed in
     * @param array $params
     * @param Builder $query
     * @return Builder
     */
    private function getQueryFromParams(array $params, Builder $query)
    {
        if ($params['question_id'] ?? false) {
            $query->where('question_id', '=', $params['question_id']);
        }

        return $query;
    }
}
