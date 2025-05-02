<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionDependency extends Model
{
    protected $table = 'question_dependencies';


    protected $fillable = [
        'question_option_id',
        'child_question_id',
        'sort',
    ];

    public function option()
    {
        return $this->belongsTo(QuestionOption::class, 'question_option_id');
    }

    public function childQuestion()
    {
        return $this->belongsTo(Question::class, 'child_question_id');
    }
}
