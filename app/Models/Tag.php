<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table ='tags';

    protected $fillable = ['name', 'hex'];

    public function getQuestions()
    {
        return $this->hasManyThrough('App\Models\Question', 'App\Models\QuestionTag', 'id', 'question_id')->get();
    }

    public function getTags()
    {
        return $this->all();
    }
}
