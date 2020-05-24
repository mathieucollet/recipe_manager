<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed id
 * @property mixed shared
 * @property mixed user
 * @property mixed user_id
 * @method static shared()
 * @method static whereLike(string[] $array, $get)
 */
class Recipe extends Model
{
    protected $guarded = [];

    protected $appends = ['marked'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class);
    }

    /**
     * @return mixed
     */
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
