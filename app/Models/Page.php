<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $title
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Section[] $sections
 */
class Page extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['meta_title', 'meta_desc'];

    protected $casts = [
        'id' => 'integer',
        'viewable' => 'boolean',
        'editable' => 'boolean',
        'deletable' => 'boolean',
    ];

    #[Scope]
    protected function withActiveSections(Builder $query): void
    {
        $query->with(['sections' => function ($q) {
            $q->where('status', 'active')->orderBy('sort', 'asc');
        }]);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
