<?php

namespace App\Http\Controllers;

use App\Events\AnswerCreated;
use App\Models\Answer;
use App\Models\Tick;
use App\Services\Answers as AnswersService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Parsedown;

class Answers extends Controller
{
    /**
     * @var Parsedown
     */
    private $parsedown;
    /**
     * @var AnswersService
     */
    private $answers;

    public function __construct(
        Parsedown $parsedown,
        AnswersService $answers
    ) {
        $this->parsedown = $parsedown;
        $this->answers = $answers;
    }

    public function store(Request $request, int $questionId): RedirectResponse
    {
        $request->validate([
            'answer' => 'required|string|min:10'
        ]);

        $markdown = $this->parsedown->text($request->answer);

        $answer = Answer::create([
            'question_id' => $questionId,
            'answer' => $markdown,
            'answered_by' => Auth::user()->id,
        ]);

        AnswerCreated::dispatch($answer);

        return redirect('/questions/' . $questionId);
    }

    public function total(Request $request, int $id): JsonResponse
    {
        try {
            $answer = $this->answers->find($id);
        } catch (ModelNotFoundException $exception) {
            return response()->json($exception->getMessage(), 404);
        }

        return response()->json([
            'total' => $answer->tick->getTransactions()->getLastTransaction()->balance
        ]);
    }
}
