<?php

namespace App\Policies;

use App\Models\Album;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlbumPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Album $album)
    {
        return $user->id == $album->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Album $album)
    {
        return $user->id == $album->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Album $album)
    {
        return $user->id == $album->user_id;
    }

}
