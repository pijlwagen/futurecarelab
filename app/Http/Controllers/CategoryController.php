<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use App\Models\QuestionAnswer;
use App\Models\QuestionTag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);
        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'color' => 'required'
        ]);

        $category = Category::create([
            'name' => $request->input('name'),
            'hex' => $request->input('color')
        ]);

        session()->flash('success', "De categorie {$category->name} is succesvol toegevoegd.");
        return redirect(route('admin.cat.index'));
    }

    public function edit(Request $request)
    {
        $category = Category::find($request->id);
        if (!$category) return abort(404);

        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'color' => 'required'
        ]);

        $category = Category::find($request->id);
        if (!$category) return abort(404);

        $category->update([
            'name' => $request->input('name'),
            'hex' => $request->input('color')
        ]);

        session()->flash('success', "De categorie {$category->name} is succesvol aangepast.");
        return redirect(route('admin.cat.index'));
    }

    public function delete(Request $request)
    {
        $category = Category::find($request->id);
        if (!$category) return abort(404);
        foreach ($category->getRelationShips() as $relationShip) {
            $relationShip->delete();
        }
        $category->delete();

        session()->flash('success', 'Categorie is verwijderd.');
        return back();
    }
}
