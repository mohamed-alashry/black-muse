<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $question_option_id
 * @property int $child_question_id
 * @property int $sort
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\QuestionOption|null $option
 */
class QuestionDependency extends Model
{
    protected $table = 'question_dependencies';


    protected $fillable = [
        'question_option_id',
        'child_question_id',
        'sort',
    ];

    public function option(): BelongsTo
    {
        return $this->belongsTo(QuestionOption::class, 'question_option_id');
    }

    public function childQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'child_question_id');
    }
}
