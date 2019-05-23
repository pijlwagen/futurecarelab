<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use App\Models\QuestionAnswer;
use App\Models\QuestionTag;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::check()) {
            session()->flash('danger', ' U moet ingelogd zijn om deze actie te doen.');
            return back();
        }

        $question = Question::find($request->segment(3));

        if (!$question) abort(404);

        $request->validate([
            'content' => 'required'
        ]);

        $answer = Answer::create([
            'content' => $request->input('content'),
            'posted_by' => Auth::user()->id,
        ]);

        QuestionAnswer::create([
            'question_id' => $question->id,
            'answer_id' => $answer->id,
        ]);

        session()->flash('success', 'Vraag is beantwoord.');
        return back();
    }
}
