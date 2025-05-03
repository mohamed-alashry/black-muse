<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $text
 * @property string $type
 * @property int|null $sort
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuestionOption[] $options
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Service[] $services
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer[] $answers
 */
class Question extends Model
{
    use HasTranslations;

    public array $translatable = ['text'];

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class)->orderBy('sort');
    }

    public function services(): MorphToMany
    {
        return $this->morphedByMany(Service::class, 'questionable')
            ->withPivot('is_required')
            ->withTimestamps();
    }
}
