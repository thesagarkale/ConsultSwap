<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Services\Questions as QuestionsService;
use App\Transformers\QuestionTransformer;
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
     * @var QuestionTransformer
     */
    private $questionTransformer;

    public function __construct(
        QuestionsService $questions,
        QuestionTransformer $questionTransformer
    ) {
        $this->questions = $questions;
        $this->questionTransformer = $questionTransformer;
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
}