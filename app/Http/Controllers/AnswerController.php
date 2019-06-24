<?php

namespace App\Http\Controllers;

use App\Mail\ReplyNotification;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use App\Models\QuestionAnswer;
use App\Models\QuestionTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AnswerController extends Controller
{
    public function store(Request $request)
    {

        $question = Question::find($request->question);
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

        Mail::to($question->email)->send(new ReplyNotification($question));

        return back();
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $answer = Answer::find($id);
        if (!$answer) abort(404);
        $relation = $answer->getRawRelation();
        if ($relation) {
            $relation->delete();
        }
        $answer->delete();
        session()->flash('success', 'Antwoord is succesvol verwijderd');
        return back();
    }
}
