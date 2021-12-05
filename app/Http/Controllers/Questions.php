<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Http\Requests\QuestionRequest;
use App\Models\Category;
use App\Models\Question;
use App\Models\Tag;
use App\Services\Answers as AnswersService;
use App\Services\Questions as QuestionsService;
use App\Transformers\QuestionsTransformer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Questions extends Controller
{
    /**
     * @var AnswersService
     */
    private $answers;
    /**
     * @var QuestionsService
     */
    private $questions;

    public function __construct(
        AnswersService $answers,
        QuestionsService $questions
    ) {
        $this->answers = $answers;
        $this->questions = $questions;
    }

    /**
     * Main questions page for the user
     * @return View
     */
    public function index(Request $request): View
    {
        $paging = $this->questions->search($request->query());

        $categories = Category::query()->where('deleted_at', '=', null)->get();

        return \view('questions/index', [
            'paging' => $paging,
            'categories' => $categories->all(),
            'params' => $request->query()
        ]);
    }

    /**
     * Create a question
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(QuestionRequest $request): RedirectResponse
    {
        $question = $this->questions->createFromInput($request->input());

        return redirect('/questions/' . $question->id);
    }

    /**
     * Overview of a question
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|RedirectResponse|\Illuminate\Routing\Redirector|View
     */
    public function overview(int $id)
    {
        /** @var Question $question */
        $question = Question::query()->where('id', '=', $id)->first();

        if (!$question) {
            return redirect('/questions');
        }

        $answersPaging = $this->answers->search(['question_id' => $question->id]);

        return \view('questions/overview', [
            'question' => QuestionsTransformer::transformSingle($question),
            'answers' => $answersPaging
        ]);
    }
}
