<?php

namespace App\Http\Controllers;

use App\Models\TickTransaction;
use App\Services\Answers as AnswersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Ticks extends Controller
{
    /**
     * @var AnswersService
     */
    private $answers;

    public function __construct(
        AnswersService $answers
    ) {
        $this->answers = $answers;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function uptick(Request $request): JsonResponse
    {
        $request->validate([
            'answer_id' => 'required'
        ]);

        $answer = $this->answers->find($request->answer_id);

        /** @var TickTransaction $lastTransaction */
        $lastTransaction = $answer->tick->getTransactions()->getLastTransaction();

        $lastTransaction->update([
            'expired_at' => now()
        ]);

        TickTransaction::create([
            'tick_id' => $answer->tick->id,
            'credit' => 1,
            'debit' => null,
            'balance' => $answer->tick->getTransactions()->getLastTransaction()->balance + 1,
            'created_by' => Auth::user()->id,
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function downtick(Request $request): JsonResponse
    {
        $request->validate([
            'answer_id' => 'required'
        ]);

        $answer = $this->answers->find($request->answer_id);

        /** @var TickTransaction $lastTransaction */
        $lastTransaction = $answer->tick->getTransactions()->getLastTransaction();

        $lastTransaction->update([
            'expired_at' => now()
        ]);

        TickTransaction::create([
            'tick_id' => $answer->tick->id,
            'credit' => null,
            'debit' => 1,
            'balance' => $answer->tick->getTransactions()->getLastTransaction()->balance - 1,
            'created_by' => Auth::user()->id,
        ]);

        return response()->json([
            'success' => true
        ]);
    }
}
