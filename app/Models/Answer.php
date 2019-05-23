<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table ='answers';

    protected $fillable = ['content', 'posted_by'];

    public function getAuthor()
    {
        return $this->hasOne('App\User', 'id', 'posted_by')->first();
    }

    public function getQuestion()
    {
        return $this->hasOneThrough('App\Models\Question', 'App\Models\QuestionAnswer', 'answer_id', 'question_id', 'id')->first();
    }
}
