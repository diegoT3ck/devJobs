<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacante;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacantePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
        return $user->rol == 2;
    }

    public function view(User $user, Vacante $vacante)
    {
        //
    }


    public function create(User $user)
    {
        return $user->rol == 2;
    }

    public function update(User $user, Vacante $vacante)
    {
        //
        return $user->id === $vacante->user_id;
    }

    public function delete(User $user, Vacante $vacante)
    {
        //
    }


    public function restore(User $user, Vacante $vacante)
    {
        //
    }

    public function forceDelete(User $user, Vacante $vacante)
    {
        //
    }
}
