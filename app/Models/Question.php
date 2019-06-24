<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = ['content', 'status', 'email'];

    public function isOpen()
    {
        return $this->hasOneThrough('App\Models\Tag', 'App\Models\QuestionTag', 'question_id', 'id', 'id', 'tag_id')->first()->name === 'Open';
    }

    public function getAnswers()
    {
        return $this->hasManyThrough('App\Models\Answer', 'App\Models\QuestionAnswer', 'question_id', 'id', 'id', 'answer_id')->get();
    }

    public function getRawTag()
    {
        return $this->hasOne('App\Models\QuestionTag', 'question_id', 'id');
    }

    public function getRawCategory()
    {
        return $this->hasOne('App\Models\QuestionCategory', 'question_id', 'id');
    }

    public function getTag()
    {
        return $this->hasOneThrough('App\Models\Tag', 'App\Models\QuestionTag', 'question_id', 'id', 'id', 'tag_id')->first();
    }

    public function getCategory()
    {
        return $this->hasOneThrough(Category::class, QuestionCategory::class, 'question_id', 'id', 'id', 'category_id')->first();
    }
}
