<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Answers extends Controller
{
    public function store(Request $request, int $questionId): RedirectResponse
    {
        $request->validate([
            'answer' => 'required|string|min:10'
        ]);

        Answer::create([
            'question_id' => $questionId,
            'answer' => $request->answer,
            'answered_by' => Auth::user()->id,
        ]);

        return redirect('/questions/' . $questionId);
    }
}
