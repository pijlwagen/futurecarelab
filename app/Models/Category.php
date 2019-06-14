<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['hex', 'name'];

    public function getQuestions($open = false)
    {
        if ($open) {
            return $this->hasManyThrough('App\Models\Question', 'App\Models\QuestionCategory', 'category_id', 'id', 'id', 'question_id')->where('status', 1)->paginate(10);
        } else {
            return $this->hasManyThrough('App\Models\Question', 'App\Models\QuestionCategory', 'category_id', 'id', 'id', 'question_id')->paginate(10);
        }
    }
}
