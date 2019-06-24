<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\QuestionCategory;
use App\Models\QuestionTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class QuestionsController extends Controller
{
    public function index(Request $request)
    {
        $questions = null;
        $category = null;
        if ($request->query('categorie')) {
            $category = Category::where('name', $request->query('categorie'))->first();
            if (!$category) return abort(404);
            $questions = $category->getQuestions();
        } else {
            $questions = Question::where('status', 1)->paginate(5);
        }
        $recent = Question::latest()->limit(5)->get();

        return view('questions.index', [
            'questions' => $questions,
            'recent' => $recent,
            'category' => $category
        ]);
    }

    public function myQuestions(Request $request)
    {
        $questions = [];
        $email = $request->query('email');

        if (Cookie::get('email') && !$email) {
            $email = Cookie::get('email');
           $questions = Question::where('email', $email)->get();
        } else {
            $questions = Question::where('email', $email)->get();
        }

        return view('questions.my-questions', [
            'questions' => $questions,
            'email' => $email,
        ]);
    }

    public function view(Request $request)
    {
        $question = Question::find($request->id);

        if (!$question) abort(404);

        return view('questions.view', [
            'question' => $question,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'category' => 'required',
            'email' => 'required|email',
        ]);

        $question = Question::create([
            'content' => $request->input('question'),
            'email' => $request->input('email')
        ]);

        QuestionCategory::create([
            'question_id' => $question->id,
            'category_id' => $request->input('category'),
        ]);

        QuestionTag::create([
            'question_id' => $question->id,
            'tag_id' => 1
        ]);

        Cookie::queue('email', $request->input('email'), 10 * 365 * 24 * 60);

        session()->flash('success', 'Uw vraag is gesteld. Onze vrijwilligers zullen uw vraag zo snel mogelijk beantwoorden!');
        return redirect(route('question.view', ['id' => $question->id]));
    }

    public function close(Request $request)
    {
        $id = $request->segment(3);
        $question = Question::find($id);
        if (!$question) abort(404);
        $tag = $question->getRawTag();

        if ($request->input('answered') === '1') {
            session()->flash('success', 'Vraag is gemarkeerd als beantwoord.');
            $tag->update([
                'tag_id' => 3
            ]);
        } else {
            session()->flash('success', 'Vraag is gemarkeerd als gesloten.');
            $tag->update([
                'tag_id' => 2
            ]);
        }

        $question->update([
            'status' => 0
        ]);

        return redirect(route('question'));
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $question = Question::find($id);

        if (!$question) abort(404);

        $tag = $question->getRawTag();
        $question->getRawCategory()->delete();

        foreach ($question->getAnswers() as $answer) {
            $answer->getRawRelation()->delete();
            $answer->delete();
        }
        $tag->delete();
        $question->delete();

        session()->flash('success', 'Vraag is verwijderd.');
        return redirect(route('question'));
    }
}
