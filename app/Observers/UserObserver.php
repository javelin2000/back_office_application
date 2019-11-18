<?php

namespace App\Observers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param User $user
     * @return void
     */
    public function creating(User $user)
    {
        $user->password = Hash::make($user->password);
    }
    /**
     * Handle the user "created" event.
     *
     * @param User $user
     * @return void
     */
    public function created(User $user)
    {
        $user->roles()->attach(Role::getRoleByID(request()->input('role')));
    }

    /**
     * Handle the user "updating" event.
     *
     * @param User $user
     * @return void
     */
    public function updating(User $user)
    {
        $user->password = Hash::make($user->password);
    }

    /**
     * Handle the user "updated" event.
     *
     * @param User $user
     * @return void
     */
    public function updated(User $user)
    {
        if ( !$user->hasRole(Role::getRoleByID(request()->input('role'))->name)){
            $user->roles()->sync(Role::getRoleByID(request()->input('role')));
        }
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
