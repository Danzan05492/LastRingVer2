<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Point;
use Illuminate\Auth\Access\HandlesAuthorization;

class PointPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {        
        return true;
    }
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Point $point
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Point $point)
    {
        return $point->freedom->condemned->owner_id==$user->id;
    }
    
    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Point $point
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Point $point)
    {        
        return $point->freedom->condemned->owner_id==$user->id;
    }
    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Point $point
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Point $point)
    {
        return $point->freedom->condemned->owner_id==$user->id;
    }
}
