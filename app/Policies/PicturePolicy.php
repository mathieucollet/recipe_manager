<?php

namespace App\Policies;

use App\Picture;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PicturePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User     $user
     * @param  \App\Picture  $picture
     *
     * @return mixed
     */
    public function delete(User $user, Picture $picture)
    {
        return $user->is($picture->recipe->user);
    }
}
