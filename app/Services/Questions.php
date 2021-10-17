<?php


namespace App\Services;


use App\Models\Question;
use App\Support\Pagination;
use App\Transformers\QuestionsTransformer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

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
            'perpage' => 10,
            'page' => 1,
            'sort_by' => 'created_at',
            'sort_mode' => 'desc',
        ];

        $params = array_merge($defaults, $params);

        $query = $this->getQueryFromParams($params, Question::query());

        $total = $query->count();

        $offset = ($params['page'] - 1) * $params['perpage'];

        $query->offset($offset)->limit($params['perpage']);

        $results = $query->get();

        return new Pagination($total, $params['perpage'], $params['page'], $params, $results->all(), new QuestionsTransformer());
    }

    /**
     * @param int $id
     * @return Builder|\Illuminate\Database\Eloquent\Model
     */
    public function find(int $id)
    {
        return Question::query()->where('id', '=', $id)->firstOrFail();
    }

    /**
     * Creates the database entry for a question
     * @param array $input
     * @return mixed
     */
    public function createFromInput(array $input)
    {
        $question = Question::create([
            'title' => $input['title'],
            'description' => $input['description'],
            'created_by' => Auth::user()->id
        ]);

        $question->category()->attach($input['category']);

        return $question;
    }

    private function getQueryFromParams(array $params, Builder $query): Builder
    {
        //Created at greater than or equal
        if ($params['created_at_gte'] ?? false) {
            $query->where('created_at', '>=', $params['created_at_gte']);
        }

        if ($params['created_at_lte'] ?? false) {
            $query->where('created_at', '<=', $params['created_at_lte']);
        }

        if ($params['created_by'] ?? false) {
            $query->where('created_by', '=', $params['created_by']);
        }

        if ($params['answered_by'] ?? false) {
            $query->whereIn('id', function ($query) use ($params) {
                $query->select('question_id')
                    ->from('answers')
                    ->where('answered_by', '=', $params['answered_by']);
            });
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
