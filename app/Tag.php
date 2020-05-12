<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static create($validatedRequest)
 * @property mixed id
 */
class Tag extends Model
{
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class);
    }

    /**
     * @return string
     */
    public function home(): string
    {
        return "/admin/tag";
    }

    /**
     * @return string
     */
    public function path(): string
    {
        return "/admin/tag/{$this->id}";
    }
}
