<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Services\Answers;
use App\Services\Questions as QuestionsService;
use App\Transformers\AnswersTransformer;
use App\Transformers\QuestionsTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class Questions extends Controller
{
    /**
     * @var QuestionsService
     */
    private $questions;
    /**
     * @var QuestionsTransformer
     */
    private $questionTransformer;
    /**
     * @var AnswersTransformer
     */
    private $answersTransformer;
    /**
     * @var Answers
     */
    private $answers;

    public function __construct(
        QuestionsService $questions,
        QuestionsTransformer $questionTransformer,
        AnswersTransformer $answersTransformer,
        Answers $answers
    ) {
        $this->questions = $questions;
        $this->questionTransformer = $questionTransformer;
        $this->answersTransformer = $answersTransformer;
        $this->answers = $answers;
    }

    /**
     * API request to fetch questions
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $paging = $this->questions->search($request->query());

        return Response::json($paging->toArray());
    }

    /**
     * API request to create question
     * @param QuestionRequest $request
     * @return JsonResponse
     */
    public function create(QuestionRequest $request): JsonResponse
    {
        $question = $this->questions->createFromInput($request->input());

        return Response::json($this->questionTransformer->transformSingle($question));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function answers(Request $request, int $id): JsonResponse
    {
        $answers = $this->answers->search([
            'question_id' => $id,
        ]);

        return Response::json($answers->toArray());
    }
}