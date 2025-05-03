<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property int $question_id
 * @property string $label
 * @property string $value
 * @property int|null $sort
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\Question $question
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer[] $answers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $childQuestions
 */
class QuestionOption extends Model
{
    protected $casts = [
        'id'          => 'integer',
        'question_id' => 'integer',
        'label'       => 'string',
        'value'       => 'string',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function childQuestions(): BelongsToMany
    {
        return $this->belongsToMany(
            Question::class,
            'question_dependencies',
            'question_option_id',
            'child_question_id'
        )->withPivot('sort')
            ->orderBy('question_dependencies.sort');
    }
}
