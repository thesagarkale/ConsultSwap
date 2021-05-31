<?php


namespace App\Services;


use App\Models\Question;
use App\Support\Pagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Questions
{
    /**
     * Index search for Questions
     * @param array $params
     * @return Pagination
     */
    public function search(array $params): Pagination
    {
        $defaults = [
            'perpage' => 5,
            'page' => 1
        ];

        $params = array_merge($defaults, $params);

        $query = $this->getQueryFromParams($params, Question::query());

        $total = $query->count();

        $offset = ($params['page'] - 1) * $params['perpage'];

        $query->offset($offset)->limit($params['perpage']);

        $results = $query->get();

        return new Pagination($total, $params['perpage'], $params['page'], $params, $results->all());
    }

    public function find()
    {

    }

    public function createFromInput()
    {

    }

    private function getQueryFromParams(array $params, Builder $query): Builder
    {
        if ($params['created_at_gte'] ?? false) {
            $query->where('created_at', '>=', $params['created_at_gte']);
        }

        if ($params['created_at_lte'] ?? false) {
            $query->where('created_at', '<=', $params['created_at_lte']);
        }

        if ($params['category'] ?? false) {
            if (is_array($params['category'])) {
                $category = implode(',', $params['category']);
                $sql = "SELECT question_id FROM category_question WHERE category_id IN (:category)";
            } else {
                $sql = "SELECT question_id FROM category_question WHERE category_id = :category";
            }

            $query->whereIn('id', array_column(DB::select($sql, [$category ?? $params['category']]), 'question_id'));
        }

        if ($params['sort_by'] ?? false && $params['sort_mode'] ?? false) {
            $query->orderBy($params['sort_by'], $params['sort_mode']);
        }

        return $query;
    }
}
