<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\BlockedUser;
use App\Models\Question;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\QuestionAnswer;
use App\Models\QuestionTag;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::paginate(20);
        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function verify(Request $request)
    {
        $user = User::find($request->id);
        if (!$user) return abort(404);
        $user->update([
            'verified' => 1
        ]);

        session()->flash('success', 'Gebruiker is geverifieerd.');
        return back();
    }

    public function block(Request $request)
    {
        $user = User::find($request->id);
        if (!$user) return abort(404);

        $relation = $user->isBlocked();

        if ($relation) {
            $relation->delete();
            session()->flash('success', 'Gebruiker is niet meer geblokkeerd.');
        } else {
            BlockedUser::create([
                'user_id' => $user->id,
            ]);
            session()->flash('success', 'Gebruiker is geblokkeerd.');
        }
        return back();
    }
}
