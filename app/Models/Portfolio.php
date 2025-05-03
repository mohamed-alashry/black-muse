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
 * @property string $category
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $photo
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Item[] $items
 */
class Portfolio extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['title', 'meta_title', 'meta_desc'];

    protected $casts = [
        'id'         => 'integer',
        'title'      => 'array',
        'meta_title' => 'array',
        'meta_desc'  => 'array',
        'viewable'   => 'boolean',
        'editable'   => 'boolean',
        'deletable'  => 'boolean',
    ];

    #[Scope]
    protected function withActiveItems(Builder $query): void
    {
        $query->with(['items' => function ($q) {
            $q->where('status', 'active')->orderBy('sort', 'asc');
        }]);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
