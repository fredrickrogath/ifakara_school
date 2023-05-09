<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    //Determine if the user is allowed to view head dashboard
    public function authorizeHead(User $user){

        return $user->role == \App\Models\User::is_head
                ? Response::allow()
                : Response::deny('You are not head office.');
    }

    //Determine if the user is allowed to view bishop dashboard
    public function authorizeBishop(User $user){

        return $user->role == \App\Models\User::is_bishop
                ? Response::allow()
                : Response::deny('You are not a bishop.');
    }

    //Determine if the user is allowed to view academic dashboard
    public function authorizeAcademic(User $user){

        return $user->role == \App\Models\User::is_academic
                ? Response::allow()
                : Response::deny('You are not academic.');
    }

    //Determine if the user is allowed to view secretary dashboard
    public function authorizeSecretary(User $user){

        return $user->role == \App\Models\User::is_secretary
                ? Response::allow()
                : Response::deny('You are not a secretary.');
    }

    //Determine if the user is allowed to view accountant dashboard
    public function authorizeAccountant(User $user){

        return $user->role == \App\Models\User::is_accountant
                ? Response::allow()
                : Response::deny('You are not accountant.');
    }

    //Determine if the user is allowed to view procurement dashboard
    public function authorizeProcurement(User $user){

        return $user->role == \App\Models\User::is_procurement
                ? Response::allow()
                : Response::deny('You are not in procurement.');
    }

    //Determine if the user is allowed to view accountant_main dashboard
    public function authorizeAccountantMain(User $user){

        return $user->role == \App\Models\User::is_accountant_main
                ? Response::allow()
                : Response::deny('You are not accountant_main.');
    }

    //Determine if the user is allowed to view internal aauditor dashboard
    public function authorizeInternalAuditor(User $user){

        return $user->role == \App\Models\User::is_internal_auditor
                ? Response::allow()
                : Response::deny('You are not internal auditor.');
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
