<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table ='questions';

    protected $fillable = ['content', 'status'];

    public function isOpen()
    {
        return $this->status === 1;
    }

    public function getAnswers()
    {
        return $this->hasManyThrough('App\Models\Answer', 'App\Models\QuestionAnswer', 'id', 'question_id', 'id');
    }
}
