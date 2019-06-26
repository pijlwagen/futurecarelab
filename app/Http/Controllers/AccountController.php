<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        switch ($request->query('createdBy')) {
            case 'jeroen':
                return view('account.jeroen.index', [
                    'user' => $user
                ]);
            case 'floyd':
                return view('account.floyd.index', [
                    'user' => $user
                ]);
            case 'samuel':
                return view('account.samuel.index', [
                    'user' => $user
                ]);
            default:
                return view('account.michel.index', [
                    'user' => $user
                ]);
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        switch ($request->query('createdBy')) {
            case 'jeroen':
                //update stuff
                return redirect(route('account.index') . '?createdBy=jeroen');
            case 'floyd':
                return redirect(route('account.index') . '?createdBy=floyd');
            case 'samuel':
                //update stuff
                return redirect(route('account.index') . '?createdBy=samuel');
            default:
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email',
                ]);

                $photo = null;

                if ($request->file('photo')) {
                    $photo = Storage::disk('public')->put('/', $request->file('photo'));
                } else {
                    $photo = $user->photo;
                }

                $user->update([
                    'name' => $request->input('name'),
                    'photo' => $photo,
                    'email' => $request->input('email'),
                    'address' => $request->input('address')
                ]);
                return redirect(route('account.index') . '?createdBy=michel');
        }
    }
}
