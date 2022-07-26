<?php

namespace App\Policies;

use App\Models\Condemned;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
class CondemnedPolicy
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
        
        return true;
    }
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Condemned  $condemned
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Condemned $condemned)
    {
        return $condemned->owner_id==$user->id;
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
     * @param  \App\Models\Condemned  $condemned
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Condemned $condemned)
    {        
        return $condemned->owner_id==$user->id;
    }
    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Condemned  $condemned
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Condemned $condemned)
    {
        return $user->id == $condemned->owner_id;
    }

 
}
