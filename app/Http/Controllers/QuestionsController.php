<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function show()
    {
//        return view('questions.index');
    }

    public function view()
    {
        return view('questions.view');
    }
}
