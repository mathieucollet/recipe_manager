<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed id
 * @property mixed shared
 * @property mixed user
 * @method static shared()
 */
class Recipe extends Model
{
    protected $guarder = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
