<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereNull(string $string)
 * @method static create(array $only)
 * @method static findOrFail($id)
 * @method static find($id)
 */
class Category extends Model
{
    protected $fillable = ['name', 'parent_id', 'order'];

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('order');
    }

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
