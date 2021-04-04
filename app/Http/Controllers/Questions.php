<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Questions extends Controller
{
    /**
     * Main questions page for the user
     * @return View
     */
    public function index(Request $request): View
    {
        $defaults = [
            'perpage' => 10
        ];

        $params = array_merge($defaults, $request->query());

        $questions = Question::query()->limit($params['perpage'])->get();

        return \view('questions/index', [
            'questions' => $questions
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
        ]);

        $question = Question::create([
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => Auth::user()->id
        ]);

        if(count($request->tags)) {
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

        $answers = Answer::query()->where('question_id', $question->id)->get();

        return \view('questions/overview', [
            'question' => $question,
            'answers' => $answers
        ]);
    }

    /**
     * Show create question view
     * @return View
     */
    public function create(): View
    {
        $tags = Tag::query()->where('deleted_at', '=', null)->get();

        return \view('questions/create', [
            'tags' => $tags
        ]);
    }
}
