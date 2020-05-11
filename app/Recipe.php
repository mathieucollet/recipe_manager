<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed id
 * @property mixed shared
 * @property mixed user
 * @method static shared()
 */
class Recipe extends Model
{
    protected $guarder = [];

    protected $appends = ['marked'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getMarkedAttribute()
    {
        return Auth::user()->marks()->where('recipe_id', $this->id)->exists();
    }

    /**
     * @return string
     */
    public function path(): string
    {
        return "/recipe/{$this->id}";
    }

    /**
     * @return string
     */
    public function home(): string
    {
        return "/recipe";
    }

    /**
     * @return bool
     */
    public function isShared(): bool
    {
        return $this->shared == true;
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeShared($query)
    {
        return $query->where('shared', true);
    }
}
