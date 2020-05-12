<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create($validatedRequest)
 * @property mixed id
 */
class Tag extends Model
{
    protected $guarded = [];

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
