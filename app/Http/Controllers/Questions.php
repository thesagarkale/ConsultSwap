<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Tag;
use App\Services\Answers as AnswersService;
use App\Services\Questions as QuestionsService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return \view('questions/index', [
            'paging' => $paging
        ]);
    }

    /**
     * Creates a question
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|min:10',
            'category' => 'required'
        ]);

        /** @var Question $question */
        $question = Question::create([
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => Auth::user()->id
        ]);

        $question->category()->attach($request->category);

        if (count($request->tags)) {
            foreach ($request->tags as $tag) {
                $question->tags()->attach($tag);
            }
        }

        return redirect('/questions/' . $question->id);
    }

    /**
     * Overview of a question
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|RedirectResponse|\Illuminate\Routing\Redirector|View
     */
    public function overview(int $id)
    {
        $question = Question::query()->where('id', '=', $id)->first();

        if (!$question) {
            return redirect('/questions');
        }

        $answersPaging = $this->answers->search(['question_id' => $question->id]);

        return \view('questions/overview', [
            'question' => $question,
            'answers' => $answersPaging
        ]);
    }

    /**
     * Show create question view
     * @return View
     */
    public function create(): View
    {
        $tags = Tag::query()->where('deleted_at', '=', null)->get();

        $categories = Category::query()->where('deleted_at', '=', null)->get();

        return \view('questions/create', [
            'tags' => $tags,
            'categories' => $categories,
        ]);
    }
}
