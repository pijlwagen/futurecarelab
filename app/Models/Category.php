<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['hex', 'name'];

    public function getQuestions()
    {
//        return $this->hasManyThrough('App\Models\Question', 'App\Models\QuestionCategory', 'category_id', 'id', 'id', 'question_id')->where('status', 1)->paginate(10);
//        return $this->belongsToMany(Question::class, 'question_categories', 'category_id', 'question_id')->where('status', 1)->paginate(10);
        return $this->hasManyThrough(Question::class, QuestionCategory::class, 'category_id', 'id', 'id', 'question_id')->where('status', 1)->paginate();
    }

    public function getRelationShips()
    {
        return $this->hasMany(QuestionCategory::class, 'category_id', 'id');
    }
}
