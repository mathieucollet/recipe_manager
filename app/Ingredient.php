<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed id
 * @property mixed user
 */
class Ingredient extends Model
{
    protected $guarded = [];

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
        return "/ingredient/{$this->id}";
    }

    /**
     * @return string
     */
    public function home(): string
    {
        return "/ingredient";
    }
}
