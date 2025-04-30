<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class QuestionOption extends Model
{
    use HasTranslations;

    public array $translatable = ['label'];

    protected $casts = [
        'id'          => 'integer',
        'question_id' => 'integer',
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
