<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionTag;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function show()
    {
//        return view('questions.index');
    }

    public function view(Request $request)
    {
        $question = Question::find($request->segment(2));

        if (!$question) abort(404);

        return view('questions.view', [
            'question' => $question,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required'
        ]);

        $question = Question::create([
            'content' => $request->input('question'),
        ]);

        QuestionTag::create([
            'question_id' => $question->id,
            'tag_id' => 1
        ]);

        session()->flash('success', 'Uw vraag is gesteld. Onze vrijwilligers zullen uw vraag zo snel mogelijk beantwoorden!');
        return redirect(route('question.view', ['id' => $question->id]));
    }
}
