<?php

namespace App\Policies;

use App\Recipe;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecipePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User    $user
     * @param  \App\Recipe  $recipe
     *
     * @return mixed
     */
    public function view(User $user, Recipe $recipe)
    {
        $right = false;
        if ($user->is($recipe->user) || $recipe->isShared()) {
            $right = true;
        }
        return $right;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User    $user
     * @param  \App\Recipe  $recipe
     *
     * @return mixed
     */
    public function update(User $user, Recipe $recipe)
    {
        return $user->is($recipe->user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User    $user
     * @param  \App\Recipe  $recipe
     *
     * @return mixed
     */
    public function delete(User $user, Recipe $recipe)
    {
        return $user->is($recipe->user);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User    $user
     * @param  \App\Recipe  $recipe
     *
     * @return mixed
     */
    public function restore(User $user, Recipe $recipe)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User    $user
     * @param  \App\Recipe  $recipe
     *
     * @return mixed
     */
    public function forceDelete(User $user, Recipe $recipe)
    {
        return false;
    }
}
